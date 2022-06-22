/////////// trigger search on icon click//////////////

function loadSearch() {
    let search = (document.querySelector("#searchBar").value != "") ? document.querySelector("#searchBar").value : "anywhere"////// content of the search bar
    let rangeMin = (document.querySelector("#rentRange").value != "any") ? parseInt(document.querySelector("#rentRange").value)-500000 : "any"
    let rangeMax = (document.querySelector("#rentRange").value != "any") ? parseInt(document.querySelector("#rentRange").value) : "any"
    let propertyType = (document.querySelector("#propertyType").value != "any") ? document.querySelector("#propertyType").value : "any"
    let roomType = (document.querySelector("#roomType").value != "any") ? document.querySelector("#roomType").value : "any"

    // e.preventDefault();
    // window.location = `index.php?action=search&search=${search}&rangeMin=${rangeMin}&rangeMax=${rangeMax}&propertyType=${propertyType}&roomType=${roomType}` 
    // window.history.pushState('', '', `index.php?action=search&search=${search}&rangeMin=${rangeMin}&rangeMax=${rangeMax}&propertyType=${propertyType}&roomType=${roomType}` );
    
    const xhr = new XMLHttpRequest()

    ////// LOAD THE ROUTER with action "Search"////////
    xhr.open("get", `index.php?action=search&search=${search}&rangeMin=${rangeMin}&rangeMax=${rangeMax}&propertyType=${propertyType}&roomType=${roomType}`)

    ////// Response = searchResultsCard with $_get parameters loaded in xhr.open above //////////
    xhr.addEventListener("load", function(e) {
        if (e.target.status === 200) {
            document.querySelector("section").innerHTML = ""
            document.querySelector("section").innerHTML = xhr.response
        } else {
            console.log("bad Request")
        }
    })

    xhr.send(null)
}

//// CLICK ICON///////
document.querySelector(".searchButton").addEventListener("click", loadSearch)
 
/// ENTER KEY ////////
document.getElementById("searchBar").addEventListener("keyup", function(e) {   
    if (e.key == "Enter")
    {
        loadSearch()  
    }
})



