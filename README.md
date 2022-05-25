# IsCool - Sistema de gestão de aulas individuais 

IsCool é uma aplicação web que consiste em um sistema de gerenciamento para escolas que ofereçam aulas individuais permitindo o cadastro de diversos professores e alunos, além da relação de dados para gerar relatórios de aulas, controle de pagamentos e mensalidades, e cálculo de salários.


## Principais Módulos

- Cadastro e controle de professores:
- Cadastro e controle de alunos;
- Painel para cadastro e controle de aulas por parte do professor;
- Agenda automatizada com controle de horários disponíveis;
- Geração de PDF com relatórios de aulas consolidados por professor e aluno;
- Cadastro e controle de matrículas;
- Geração automatizada de mensalidades relativas às matrículas;
- Cadastro de diferentes cursos;
- Cadastro de modalidades com diferentes durações;
- Cadastro de descontos para alunos;
- Controle de pagamentos recebidos através de mensalidades e outras cobranças como taxa de matrícula;
- Geração automatizada das folhas de pagamento do professor;
- Cálculo automatizado do valor do salário do professor;
- Predefinição de cursos, modalidades e horários;
- Controle de usuários Administradores e Professores, com controles de permissões;

## Tecnologias Utilizadas 

- PHP 7.3
- Laravel 8
- Eloquent
- Fortify
- MySQL
- Repository Pattern
- Bootstrap 4
- JQuery

## Arquitetura
  O Padrão utilizado é o MVC, com adaptação de algumas camadas para rodar os serviços, tal como a camada de Services para processamento e cálculos para pagamentos e salário; os Repositories utilizados para posteriores adaptações de ORM's e também para abstração no tratamento de dados, isolando a camada de Models.
  O sistema já foi refatorado para aplicação de algumas práticas de Código Limpo e princípios SOLID, prezando pela responsabilidade única das classes a priori.
  Na parte do Front, foi prezado pela componentização de elementos da view utilizando a própria engine Blade, e separados por cada módulo do sistema.
  
## Telas
![Tela da Agenda](https://fafacapellari.com/demo/agenda-screen.png)
Agenda do Professor
![Tela de Salários](https://fafacapellari.com/demo/salario-screen.png)
Valores discriminados do salário
![Tela da Aulas](https://fafacapellari.com/demo/aulas-screen.png)
Relátórios de aulas

## Demo
  Para acessar o sistema <a href="https://demoescola.fafacapellari.com"> clique aqui </a> e acesse com as seguintes credenciais:
  <br>
  Usuário: demo@admin.com
  <br>
  Senha: 123456
  
