document.getElementById('toggle-sidebar').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('active');
    document.getElementById('main-content').classList.toggle('expanded');
});

document.getElementById('central-aluno-btn').addEventListener('click', function () {
    const submenu = document.getElementById('central-aluno-submenu');
    submenu.classList.toggle('hidden');
    const arrow = this.querySelector('.arrow-icon');
    arrow.classList.toggle('rotate');
});


var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elemento) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elemento == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);


/**SCRIPT QUE MOSTRA OS SELECTS PARA FILTRAR BUSCA */
const selectPrincipal = document.getElementById('selectPrincipal');
const selectDependente = document.getElementById('selectSecundario');

function carregarOpcoesDependentes(valorSelecionado) {
  // Limpar opções anteriores
  selectDependente.innerHTML = '<option value="todos">Todos</option>';

  // Carregar opções de acordo com o valor selecionado
  if (valorSelecionado === 'status') {
    const status = ['Aprovado', 'Reprovado', 'Pendente'];
    for (const cert of status) {
      const option = document.createElement('option');
      option.value = cert;
      option.textContent = cert;
      selectDependente.appendChild(option);
    }
  } else if (valorSelecionado === 'modulo') {
    // Implement logic to populate options for colors (e.g., red, blue, green)
    const modulos = ['Módulo I', 'Módulo II', 'Módulo III', 'Módulo IV']; // Example color options
    for (const modulo of modulos) 
      {
      const option = document.createElement('option');
      option.value = modulo;
      option.textContent = modulo;
      selectDependente.appendChild(option);
    }
  } 

  // Habilitar o segundo select
  if (valorSelecionado === 'status' || valorSelecionado === 'modulo') {
    selectDependente.disabled = false;
    selectDependente.style.display = 'block';
  } else {
    selectDependente.disabled = true;
    selectDependente.style.display = 'none';
  }

}

selectPrincipal.addEventListener('change', function() {
  const valorSelecionado = this.value;
  carregarOpcoesDependentes(valorSelecionado);
});