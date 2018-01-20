tripode
=======

### What is it?
Tripode is a very simple php website builder where you can upload your photos.
The idea behind is having the simplest possible siteand reduce the configuration to minimum (of course this results in a little customizable site but easy to use and install).
It is good for very small image galleries that you want to create in an instant with free hosting.

Photos are divided into categories and may have a very short description.
A category can have a bigger description using html.
The home page is as well customizable with custom html.

Images can be uploaded within categories. They are resized with a width of 1200 pixels (a thumb as well is created)

### Live-Demo:
To see tripode in action see http://tripode.net46.net/

### Setup
The beauty of this website is that it is extremely easy to setup.
There's even no need of a database!
All you need to do is checkout the repository and upload it on a php server.
Now you are ready to navigate and personalize it.

In order to get updates easier it is good practice to create a *.gitignore* file as follows:
<pre>
.gitignore
data/configuration.txt
gallery/
</pre>

The following command are as well useful:
<pre>
git update-index --assume-unchanged pages/home.html
</pre>

### Update
At the moment the project is very small and I didn't create any particular process to get updates.

By now getting the update is as easy as doing a
<pre>
git pull
</pre>

The problem that if there are conflicts the procedure gets more complicate:
<pre>
git update-index --no-assume-unchanged pages/home.html

git pull

git mergetool
# assuming that you know what has been changed between your version and the new version

git update-index --assume-unchanged pages/home.html
</pre>
