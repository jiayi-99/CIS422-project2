## design documentation:
Log in to the system:
Contains login page and registration page, and links each user, stores user information in the database
![Image text](https://github.com/jiayi-99/CIS422-project2/blob/main/img/WechatIMG1922%201.jpeg)
2. Favorite playlist
Function: 1. Search system, you can search the playlist in the existing database
          2. Save favorite playlist
          3. Users can add their favorite singer and song
![Image text](https://raw.githubusercontent.com/jiayi-99/CIS422-project2/main/img/WechatIMG552.jpeg)
![Image text](https://github.com/jiayi-99/CIS422-project2/blob/main/img/WechatIMG554.png)
## Test Case

Website: http://yy.mandyapp.com/Home.php/Index/login

Using test account to log in system
	
	account: testaccount
	
	password: test1234

Successfully log in

test collect the songs:
	
	try to click "favorites" behind the first song
	
	and then click "my collection" on the top lab
	
	if we can see the song in the list --> test is success 

test add new singer and song:
	
	click "singer management" to add the singer
	
	click "song management" to add the song
	
	go bcak to "search center"
	
	if we can find(search) the song in the list --> test is success

test the data is stored:
	
	click "drop out"
	
	And use test account log in again
	
	if the data didn't disappear --> test is success
