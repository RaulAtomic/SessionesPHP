const panelCards = document.querySelectorAll(".hover-card");

for(const setAtriibut of panelCards){
    setAtriibut.addEventListener("mouseover", ()=>{
        setAtriibut.classList.add("shadow-lg")
    })

    setAtriibut.addEventListener("mouseout", ()=>{
        setAtriibut.setAttribute("class", "card")
    })

}