<?php

function generateHeader(): void
{
    echo "<header style='display: flex; justify-content: space-between; margin-bottom: 50px;'>
            <h3 style='margin-left: 40px;'><a href='./home.php'>Gerenciador de Tarefas</a></h3> 

            <nav style='margin-right: 60px;'>
              <a href='../views/form_create.php'>Adicionar</a> 
              <a href='../actions/user/logout.php'>Sair ➡️</a> 
            </nav>
          </header>";
}
