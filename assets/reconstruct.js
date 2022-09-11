let width = window.screen.availWidth;
const project = document.getElementsByClassName("skill");

if (width <= 1000) {
    for (let i of project)
    i.classList.replace("skill", "skill_mobile");
    
};
