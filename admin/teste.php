<html>
<table>
    <thead>
        <tr>
            <th scope="col">Código</th>    
            <th scope="col">Nome</th>
            <th scope="col">Imagem</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include 'conecta.php';
        $pesquisa = mysqli_query($conn, "SELECT * FROM arquivos");
        $row = mysqli_num_rows($pesquisa);
        if($row > 0){
            while($registro = $pesquisa-> fetch_array()){
                $image = $registro['nome'];
                $image_src = "imagens/".$image;
                echo '<tr>';
                echo '<td>'.$registro['id'].'</td>';
                echo '<td>'.$registro['nome'].'</td>';
                echo '<td><img src="'.$image_src.'"</td>';
                echo '</tr>';
            }
        echo '</tbody>';
        echo '</table>';
        }
        else {
            echo "Não há registros inseridos!!!";
            echo '</tbody>';
            echo '</table>';
        }
?>
</html>