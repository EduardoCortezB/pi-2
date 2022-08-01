function valForm() {
  let out = true;
  const in1 = document.getElementById('validationCustom01')
  if (in1.value.trim().length != 0 && in1.value.trim().length > 2) {
    document.getElementById('valc1').style = "display: none;";
  } else {
    in1.style = "border-color: #ff0000de; !important;"
    document.getElementById('valc1').style = "display: show;";
    out = false;
  }

  const in2 = document.getElementById('validationCustom02')
  if (in2.value.trim().length != 0 && in2.value.trim().length > 2) {
    document.getElementById('valc2').style = "display: none;";
  } else {
    in2.style = "border-color: #ff0000de; !important;"
    document.getElementById('valc2').style = "display: show;";
    out = false;
  }

  const in3 = document.getElementById('validationCustom03')
  const regexp = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
  if (in3.value.trim().length != 0 && in3.value.trim().length > 2 && regexp.test(in3.value.trim())) {
    document.getElementById('valc3').style = "display: none;";
  } else {
    in3.style = "border-color: #ff0000de; !important;"
    document.getElementById('valc3').style = "display: show;";
    out = false;
  }

  const in4 = document.getElementById('validationCustom04')
  if (in4.value.trim().length != 0 && in4.value.trim().length == 10) {
    document.getElementById('valc4').style = "display: none;";
  } else {
    in4.style = "border-color: #ff0000de; !important;"
    document.getElementById('valc4').style = "display: show;";
    out = false;
  }

  const in5 = document.getElementById('validationCustom05')
  if (in5.value.trim().length != 0 && in5.value.trim().length > 5 && in5.value.trim().length < 30) {
    document.getElementById('valc5').style = "display: none;";
  } else {
    in5.style = "border-color: #ff0000de; !important;"
    document.getElementById('valc5').style = "display: show;";
    out = false;
  }

  return out;
}
function stpOne() {
  const breadcrumbs = document.getElementById('breadCrumbs').content.cloneNode(true);
  // ol
  const ol = breadcrumbs.querySelector('ol')
  // li resaltado
  const li = ol.children[1];
  li.textContent = "REGISTRO DEL ASPIRANTE"
  // li con ancla
  const lia = breadcrumbs.querySelector('ol').children[0].cloneNode(true);
  lia.children[0].type = 'button'
  lia.children[0].href = '#'
  lia.children[0].onclick = stpTwo
  lia.children[0].textContent = "INFORMACIÓN DEL ASPIRANTE"
  ol.append(lia)
  // h2 del baner
  breadcrumbs.querySelector('h2').textContent = "REGISTRO DEL ASPIRANTE";
  document.getElementById('contRegister').innerHTML = ''
  document.getElementById('contRegister').append(breadcrumbs);

  document.getElementById('register_aspirant_celut_step1').style = "display:show;"
  document.getElementById('register_aspirant_celut_step2').style = "display:none;"
}

function stpTwo() {
  const breadcrumbs = document.getElementById('breadCrumbs').content.cloneNode(true);
  // ol
  const ol = breadcrumbs.querySelector('ol')
  // segundo li, sin remarcado
  const a = document.createElement('a');
  a.type = 'button'
  a.href = '#'
  a.onclick = stpOne
  a.textContent = "REGISTRO DEL ASPIRANTE";
  const li = ol.children[1].cloneNode(true);
  li.append(a)
  ol.append(li)
  ol.removeChild(ol.children[1])
  // segundo li
  const liS = document.createElement('li');
  liS.textContent = "INFORMACIÓN DEL ASPIRANTE";
  ol.append(liS)

  // h2 del baner
  breadcrumbs.querySelector('h2').textContent = "INFORMACIÓN DEL ASPIRANTE";
  document.getElementById('contRegister').innerHTML = ''
  document.getElementById('contRegister').append(breadcrumbs);


  // ocultamos el primer paso del formulario
  document.getElementById('register_aspirant_celut_step1').style = "display: none";
  document.getElementById('register_aspirant_celut_step2').style = "display: show";
}
function stepTwo() {

  // validamos el primero formulario
  if (valForm()) {
    stpTwo();
  }
}

document.addEventListener("DOMContentLoaded", () => {
  stpOne()
})

const isStudentCheckbox = document.getElementById('flexRadioDefault2');
isStudentCheckbox.addEventListener("change", () =>{
  let slct = document.getElementById('form-select-careers')
  slct.style='display:show'
})
const isStudentCheckbo2 = document.getElementById('flexRadioDefault1');
isStudentCheckbo2.addEventListener("change", () =>{
  let slct = document.getElementById('form-select-careers')
  slct.style='display:none'
})

document.getElementById('registerAspirant').addEventListener('submit', (e) =>{
  e.preventDefault();

  console.log(e.target.querySelectorAll('input'));
  console.log('ddd');
})