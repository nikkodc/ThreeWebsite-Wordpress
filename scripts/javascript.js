// Navigation menu
function changeBar(x) {
    x.classList.toggle("change-bar");
}

// Image change

var slideIndex = 1;
showDiv(slideIndex);

function showContent(n) {
	showDiv(slideIndex += n);
}

function showDiv(n) {
	var i;
	var x = document.getElementsByClassName("slide-content");
	if (n > x.length) {
		slideIndex = 1
	}
	if (n < 1) {
		slideIndex = x.length
	}
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";  
  	}

  	x[slideIndex-1].style.display = "block";  
}

// Post an article 
var addArticle = document.querySelector(".post-article-button");

if(addArticle){
	addArticle.addEventListener("click",function(){
		var articlePost={
			"title": document.querySelector('.article-post [name="article-title"]').value,
			"content": document.querySelector('.article-post [name="article-content"]').value,
			"status": "publish"
		}
		var createArticlePost = new XMLHttpRequest();
		createArticlePost.open("POST",hideData.siteURL+"/wp-json/wp/v2/posts");
		createArticlePost.setRequestHeader("X-WP-Nonce",hideData.nonce);//Number use once
		createArticlePost.setRequestHeader("Content-Type","application/json;charset=UTF-8");
		createArticlePost.send(JSON.stringify(articlePost));
		createArticlePost.onreadystatechange = function(){
			if(createArticlePost.readyState == 4){
				if(createArticlePost.status == 201){
					alert("success");
				}else{
					alert("Error");
				}
			}
		}
	});
}
