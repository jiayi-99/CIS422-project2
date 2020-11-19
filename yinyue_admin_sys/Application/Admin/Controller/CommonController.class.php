<?php
/**
 * Created by PhpStorm.
 * User: WSH
* Date: 2019/5/7
* Time: 13:17
*/

namespace Admin\Controller;


use Admin\services\UploadService;
use Think\Controller;

class CommonController extends Controller
{
    /*
        * 上传图片
        * 基于百度上传插件webuploader
        * */

    public function uploadimg()
    {
        $result = array();

        $upload = new \Think\Upload (); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->savePath = '/Uploads/'; // 设置附件上传目录
        $upload->rootPath = './Public'; // 设置附件上传根目录
        $upload->subName = ''; // 设置附件上传子目录

        $info = $upload->upload();
        if (!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
        } else {
            $result ['status'] = 200;
            $result ['msg'] = '上传成功';

            $object = date("Y-m-d")."/".$info['file']['savename'];//想要保存文件的名称
            $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/Public' . $info['file']['savepath'] . $info['file']['savename'];//文件路径，必须是本地的。
            $result["pic_url"]=$url;
        }
        exit(json_encode($result));
    }

    /*
     * 上传文件
     * 基于百度上传插件webuploader
     * 文件上传时要相应设置php.ini的 post_max_size,upload_max_filesize
     * */

    public function uploadfile()
    {
        $result = array();

        $upload = new \Think\Upload (); // 实例化上传类
        $upload->maxSize = 1024 * 1024 * 1024; // 设置附件上传大小

        $upload->savePath = '/Uploads/document/'; // 设置附件上传目录
        $upload->rootPath = './Public'; // 设置附件上传根目录
        $upload->subName = ''; // 设置附件上传子目录
        $info = $upload->upload();

        if (!$info) {
            $result ['status'] = -100;
            $result ['message'] = $upload->getError();
        } else {
            $result ['status'] = 200;
            $result ['message'] = '上传成功';

            $object = date("Y-m-d")."/".$info['file']['savename'];//想要保存文件的名称
            $file = __ROOT__ . './Public' . $info['file']['savepath'] . $info['file']['savename'];//文件路径，必须是本地的。
            $model = new UploadService();
            $result ['url'] = $model->upload($object, $file);
//            $result ['url'] = 'https://' . $_SERVER["HTTP_HOST"] . __ROOT__ . '/Public' . $info['file']['savepath'] . $info['file']['savename'];
        }

        exit(json_encode($result));
    }

    /*分片上传*/
    public function fp_upload(){
        //声明返回数组
        $result = array();

        //声明头部协议信息
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");				//内容过期时间
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");	//标记内容最后修改时间
        header("Cache-Control: no-store, no-cache, must-revalidate");	//强制不缓存
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");										//禁止本页被缓存

        //提交方式判断
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit;
        }

        //错误返回
        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }

        //定义php页面执行时间
        @set_time_limit(5 * 60);



        //文件目录
        $targetDir = './Public/uploads_file';		//临时目录
        $uploadDir = '/';			//文件目录

        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        // Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir,0777,true);
        }
        // Create target dir
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir,0777,true);
        }
        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }
        $oldName = $fileName;
        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

        // $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;

        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"status":-100,"message": "无法打开临时目录.","jsonrpc" : "2.0", "error" : {"code": 100, "message": "无法打开临时目录."}, "id" : "id"}');
            }



            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }
                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }

        // Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"status":-100,"message": "无法打开输出流","jsonrpc" : "2.0", "error" : {"code": 102, "message": "无法打开输出流"}, "id" : "id"}');
        }
        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"status":-100,"message": "Failed to move uploaded file.","jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }
            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"status":-100,"message": "Failed to open input stream.","jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"status":-100,"message": "Failed to open input stream.","jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        //文件分片大小 1M
        $file_size = 1024*1024;
        while ($buff = fread($in,$file_size)) {
            fwrite($out, $buff);
        }
        @fclose($out);
        @fclose($in);
        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");
        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }

        if ($done) {
            $pathInfo = pathinfo($fileName);
            $hashStr = substr(md5($pathInfo['basename']),8,16);
            $hashName = $hashStr.'.'.$pathInfo['extension'];
            $uploadPath = $uploadDir.$hashName;

            if (!$out = @fopen($targetDir.$uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0","message": "无法打开输出流.'.$uploadPath.'", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            //合并文件
            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }
                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }
                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }
                flock($out, LOCK_UN);
            }
            @fclose($out);

            //文件重命名
            rename($targetDir.$uploadPath,$filePath);

            $result ['status'] = 200;
            $result ['message'] = '上传成功';
            $result ['fileSuffixes'] = $pathInfo['extension'];
            $result ['url'] = $_SERVER["REQUEST_SCHEME"].'://' . $_SERVER["HTTP_HOST"] .__ROOT__.$filePath;
            die(json_encode($result));
        }

        $result = array();
        $result ['status'] = -100;
        $result ['message'] = "上传失败";
        die(json_encode($result));
    }

    /* 树形结构转数组 */

    public function create_tree($arr, $pid)
    {

        $ret = array();
        foreach ($arr as $k => $v) {
            if ($v['parentid'] == $pid) {
                $tmp = $arr[$k];
                unset($arr[$k]);

                $tmp['nodes'] = $this->create_tree($arr, $v['id']);

                if (count($tmp['nodes']) == 0) {
                    unset($tmp['nodes']);
                }

                $ret[] = $tmp;
            }
        }

        return $ret;
    }

    /* 图片验证码的方法 */
    public function img_code()
    {
        $config = array(
            'fontSize' => 28,            // 验证码字体大小
            'length' => 5,                    // 验证码位数
            'useNoise' => false,            // 关闭验证码杂点
            'codeSet' => '0123456789',        //字符集
            'useCurve' => false                //混淆曲线
        );

        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

}
