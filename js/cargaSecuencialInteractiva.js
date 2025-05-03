const boxes = document.querySelectorAll(".box");

async function animateSequence() {
  for (let i = 0; i < boxes.length; i++) {
    const currentBox = boxes[i];
    const description = currentBox.querySelector(".description");
    const progressBar = currentBox.querySelector(".progress-bar");
    const progress = currentBox.querySelector(".progress");

    boxes.forEach(box => {
      box.classList.remove("active");
      box.style.padding = "0px 0px 0px 20px";
      box.style.margin = "0px 0px 5px 0px";
      box.querySelector(".description").style.display = "none";
      box.querySelector(".progress-bar").style.display = "none";
      box.querySelector(".progress").style.width = "0";
      box.querySelector("path").style.stroke = "#1E1E1E";
    });

    currentBox.classList.add("active");
    currentBox.style.padding = "20px";
    currentBox.style.margin = "20px 0px 20px 0px";
    description.style.display = "block";
    progressBar.style.display = "block";
    void progress.offsetWidth;
    progress.style.width = "100%";
    currentBox.querySelector("path").style.stroke = "#2BD47B";
  
    await new Promise(resolve => setTimeout(resolve, 5000));
  }

  setTimeout(animateSequence, 500);
}

window.addEventListener("load", animateSequence);