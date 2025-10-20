<?php

function generateHeader(): void
{
    echo "<header style='display: flex; justify-content: space-between; margin-bottom: 80px;'>
            <h3 style='margin-left: 50px;'>Gerenciador de Tarefas</h3> 

            <nav style='margin-left: 60px;'>
              <a href='../views/form_create.php'>Adicionar</a> 
              <a href='../actions/logout.php'>Sair ➡️</a> 
            </nav>
          </header>";
}
