<?php
include_once("../conexao.php");
?>

<style>
 .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    width: 40%;
    margin-left: 100px;
  }

  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
  }

  .container {
    padding: 2px 16px;
  }
</style>
<?php
$sql = "SELECT * FROM decoracoes WHERE temas_cod_tema = $id";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
?>

  <div class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg m-3">
    <img class="object-cover w-full h-56" src="<?php echo $row["img_decoracao"] ?>" alt="avatar">

    <div class="py-5 text-center">
      <span href="" class="block text-2xl font-bold text-gray-800 " tabindex="0" role="link"><?php echo $row["descricao_decoracao"] ?></span>
    </div>
  </div>


<?php } ?>