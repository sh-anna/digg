
document.getElementById('delete-post-btn').addEventListener( 'click', function (e) {
    if(confirm('Are your sure you want delete this post?') ) {
        return true;
    }else {
        e.preventDefault();
    }
  
})

