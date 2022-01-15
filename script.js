function updateScreen($id){
let position=document.querySelector(".classHelper-"+$id)
let clickAdress=document.querySelector("#helper-"+$id)
console.log(position)
clickAdress.addEventListener("click",()=>{
    position.classList.toggle("show")
})
}



function liveSearch(type){

let searchValue=document.getElementById("adress").value
searchingData(searchValue,type)
}


async function searchingData(searchValue,type){
    const data=await fetch("searchFetcher.php",{
        method:"POST",
        body:JSON.stringify({username:searchValue,type:type})
    })
  const result=await data.text()
  document.getElementById("livesearch").innerHTML=result

}

async function getData(event,type){
    event.preventDefault();
    let searchValue=document.getElementById("adress").value
    const data= await fetch("showPerformanceFetcher.php",{
        method:"POST",
        body:JSON.stringify({username:searchValue,type:type})
    })
    const result=await data.text()
    document.getElementById("showPerformance").innerHTML=result

// console.log(resultJson["performans"][Object.keys(resultJson["performans"])[1]])
// console.log(Object.keys(resultJson["performans"])[0])
// Object.keys(resultJson).forEach(item=>{
//     Object.keys(resultJson["performans"]).forEach(item=>{
//         console.log(item+" "+resultJson["performans"][item])
//         document.getElementById("showPerformance").innerHTML+=
 
//       `
//       <div class="row">
//       <div class='col-md-2'> ${resultJson["username"]}</div>
//       <div class='col-md-2'>${resultJson["performans"][item]}</div>
//       <div class='col-md-2'>${item}</div>
//       </div>
//       `
//     })
// })

    // document.getElementById("showPerformance").innerHTML+=
  
    // `
    // <div class="row">
    // <div class='col-md-2'> ${resultJson["username"]}</div>
    // <div class='col-md-2'>${resultJson["performans"]}</div>
    // <div class='col-md-2'>${resultJson["performans"][Object.keys(resultJson["performans"])]}</div>
    // </div>
    // `
}

async function ghostGetData(type){

    let searchValue=document.getElementById("adress").value
    const data= await fetch("showPerformanceFetcher.php",{
        method:"POST",
        body:JSON.stringify({username:searchValue,type:type})
    })
    const result=await data.text()
    document.getElementById("showPerformance").innerHTML=result
}



document.getElementById("adress").addEventListener("change",()=>{
    let searchValue=document.getElementById("adress").value
document.getElementById("username").innerText=searchValue

})

async function addData(type){
    let myUsername=document.getElementById("username").innerText
    let myTarih=document.getElementById("myTarih").value
    let myPerformans=document.getElementById("myPerformans").value

    const data=await fetch("addPerformanceFetcher.php",{
        method:"POST",
        body:JSON.stringify({
            username:myUsername,
            tarih:myTarih,
            performans:myPerformans,
            type:type
        })
    })
    ghostGetData(type);
    document.getElementById("myTarih").value=""
    document.getElementById("myPerformans").value=""


}