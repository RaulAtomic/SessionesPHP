const panelCards = document.querySelectorAll(".hover-card");

window.document.onload = ()=>{
    alert("Hola Mundo");
}

for(const setAtriibut of panelCards){
    setAtriibut.addEventListener("mouseover", ()=>{
        setAtriibut.classList.add("shadow-lg")
    })

    setAtriibut.addEventListener("mouseout", ()=>{
        setAtriibut.setAttribute("class", "card")
    })

}