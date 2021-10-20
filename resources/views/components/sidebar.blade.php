<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-music"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Escola de música</sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{url('/')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Recursos Humanos
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfessores" aria-expanded="true" aria-controls="collapseProfessores">
        <i class="fas fa-fw fa-user"></i>
        <span>Professores</span>
      </a>
      <div id="collapseProfessores" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{url('/professores')}}">Listagem de professores</a>
          <a class="collapse-item" href="{{url('/professores/create')}}">Adicionar professor</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAlunos" aria-expanded="true" aria-controls="collapseAlunos">
        <i class="fas fa-fw fa-graduation-cap"></i>
        <span>Alunos</span>
      </a>
      <div id="collapseAlunos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{url('/alunos')}}">Listagem de alunos</a>
          <a class="collapse-item" href="{{url('/alunos/create')}}">Adicionar novo aluno</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Heading -->
    <div class="sidebar-heading">
      Docência
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAulas" aria-expanded="true" aria-controls="collapseAulas">
        <i class="fas fa-fw fa-book"></i>
        <span>Aulas</span>
      </a>
      <div id="collapseAulas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{url('/aulas')}}">Relatórios</a>
          <a class="collapse-item" href="{{url('/aulas/exportar')}}">Exportar relatórios</a>
          <a class="collapse-item" href="{{url('/aulas/create')}}">Adicionar aula</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMatriculas" aria-expanded="true" aria-controls="collapseMatriculas">
        <i class="fas fa-fw fa-address-card"></i>
        <span>Matrículas</span>
      </a>
      <div id="collapseMatriculas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{url('/matriculas')}}">Consultar</a>
          <a class="collapse-item" href="{{url('/matriculas/gerarMensalidades')}}">Gerar mensalidades</a>
          <a class="collapse-item" href="{{url('/matriculas/create')}}">Adicionar matrícula</a>
          <a class="collapse-item" href="{{url('/descontos')}}">Descontos</a>
          {{-- <a class="collapse-item" href="{{url('/matriculas/liberar')}}">Liberar matrículas</a> --}}
        </div>
      </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
      Financeiro
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSalarios" aria-expanded="true" aria-controls="collapseSalarios">
        <i class="fas fa-fw fa-calculator"></i>
        <span>Salários</span>
      </a>
      <div id="collapseSalarios" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{url('/salarios')}}">Listagem de salários</a>
          <a class="collapse-item" href="{{url('/salarios/create')}}">Gerar folhas de pagamento</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCobrancas" aria-expanded="true" aria-controls="collapseCobrancas">
        <i class="fas fa-fw fa-exclamation"></i>
        <span>Cobranças</span>
      </a>
      <div id="collapseCobrancas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{url('/mensalidades')}}">Mensalidades</a>
          <a class="collapse-item" href="{{url('/cobrancas')}}">Taxas</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
      Configurações
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
        <i class="fas fa-fw fa-users"></i>
        <span>Usuários</span>
      </a>
      <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{url('/users')}}">Listagem</a>
          <a class="collapse-item" href="{{url('/register')}}">Adicionar novo</a>
        </div>
      </div>
    </li>
    


    {{-- <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Utilities:</h6>
          <a class="collapse-item" href="utilities-color.html">Colors</a>
          <a class="collapse-item" href="utilities-border.html">Borders</a>
          <a class="collapse-item" href="utilities-animation.html">Animations</a>
          <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Login Screens:</h6>
          <a class="collapse-item" href="login.html">Login</a>
          <a class="collapse-item" href="register.html">Register</a>
          <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Other Pages:</h6>
          <a class="collapse-item" href="404.html">404 Page</a>
          <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>