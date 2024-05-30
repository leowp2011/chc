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

  
  