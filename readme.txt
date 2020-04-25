					Project Title : Balita-World Of Thought
								
	-The Main Objective Of This Website taps into the brains of the world’s most insightful writers, thinkers, and storytellers to bring you the smartest takes on topics that matter. 
	 So whatever your interest, you can always find fresh thinking

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-How To Run??
 After Starting Apache and MySQL in XAMPP, follow the following steps

1st Step: Extract file
2nd Step: Copy main project folder
3rd Step: Paste in xampp/htdocs/

Now Connecting Database:

4th Step: Open a browser and go to URL “http://localhost/phpmyadmin/”
5th Step: Then, click on databases tab
6th Step: Create database naming “vaatchitdb” and then click on import tab
7th Step: Click on browse file and select “vaatchitdb.sql” file which is inside “databasefile” folder
8th Step: Click on go.

After Creating Database:

9th Step: Open a browser and go to URL “http://localhost/VaatChit/home.php”

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	 :Major Functionality Provided By WebSite:

1)HOME
2)LOGIN
3)SIGNUP
4)DEVELOPER LOGIN
5)CHATTING WITH FRIENDS
6)INBOX FOR UNREAD MESSAGES
7)BLOCKING AND UNBLOCKING OF FRIENDS 
8)REPORTING USER
9)SEND REQUEST TO USER
10)CHATTING WITH FRIENDS
11)FIND FRIENDS
12)LIST OF ONLINE USERS
13)PROFILE OF REGISTERED USER

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
:::HOME PAGE:::
	-Upload Blog
	-My Blog
	-Categories
	-Change Password
	-About
	-Contact
	-Logout/Login

	=:LOGIN:=
	User shall login to access features that only can be accessed by login

	=:SIGNUP:=
	User shall signup to access site functionalites which can't be accessed without login/signup

	=:UPLOAD BLOG:=
	After Successfully logged in, User may upload his experience via posting a blog.

	=:MY BLOG:=
	After uploading a blog, User can access uploaded blog related stats such as likes,views,comments, etc.. and delete the blog if required.

	=:CATEGORIES:=
	User can see all uploaded blogs by platform communiy which are sorted in categories such as lifestyle,travel,business,etc.

	=:HASHTAG SEARCH:=
	User can access various blogs by searching tags for them such as #lifestyle,#travel,#foodlover,etc.

	=:CONTACT:=
	If user may suspect blog abusements, he can report the platform admins by contacting them.

	=:ABOUT US:=
	In this section, Developer community expressing reasons for the platform such as platform motto,objectives etc.
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
:::Functionality Of Admin side:::
	=:Add Admin:=
	In this Section Admin Can Be Added By Super Admin.

	=:Registered Users:=
	Admin Can See all Registered User and Manage them.

	=:Bloggerz Blogs:=
	Admin Can View all the Blogs Uploaded By users and also can delete the Blog if admin suspect abusements.

	=:Blogger Comment:=
	Admin can view all the commments uploaded by users on different blog and also can delete the Blog if admin suspect abusements.

	=:Blogger Like:=
	Admin can view all the commments uploaded by users on different blog.

	=:FeedBack:=
	Reports Which Are submitted by platform users can be seen in this section.

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
::Flow::

Stage 1:
This platform can be accessed by any type of users, but some of features aren't directly accessable without login. User shall first signup/login to access all content of the platform. 

Stage 2:
After logging in, User will redirected to Homepage. Thenafter user can perform various tasks such as provided in Major Functionality.

Stage 3:
User shall view all the posts in Homepage which are uploaded by other users and also review the blogs by post comment on blog. 

