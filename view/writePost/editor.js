const image_input = document.querySelector("blog-image")

var uploaded_image = "";

image_input.addEventListener("change",function(){
    console.log(image_input.value);
    // const reader = new FileReader();
    // reader.addEventListener("load",()=>{
    //     uploaded_image = reader.result;
    //     document.getElementsByClassName("image").style.backgroundImage = url($(uploaded_image));
    //     reader.readAsDataURL(this.files[0]);
    // })
})