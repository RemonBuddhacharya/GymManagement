let pop = document.getElementById('pop');

pop.addEventListener("click" , function(){
    console.log("hello")
    let img = document.getElementById('img')
    if (img.style.display === "none") {
        img.style.display = "block";
      } else {
        img.style.display = "none";
      }
})


function popup(image){
    console.log("hello")
    console.log(image)
    let img = document.getElementById(image)
    console.log(img)
    if (img.style.display === "none") {
        img.style.display = "block";
      } else {
        img.style.display = "none";
      }
}