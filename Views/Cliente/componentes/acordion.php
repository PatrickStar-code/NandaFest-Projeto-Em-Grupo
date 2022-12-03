<?php
include_once("../conexao.php");
$sql = "SELECT * FROM temas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {


?>
    <h2 id="accordion-collapse-heading-<?php echo $row["cod_tema"] ?>">
      <button type="button" class="flex items-center justify-between w-full p-3 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-<?php echo $row["cod_tema"] ?>" aria-expanded="false" aria-controls="accordion-collapse-body-2">
        <span><?php echo $row["descricao_tema"] ?></span>
        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </h2>
    <div id="accordion-collapse-body-<?php echo $row["cod_tema"] ?>" class="hidden" aria-labelledby="accordion-collapse-heading-<?php echo $row["cod_tema"] ?>">
      <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700">
        <?php
        $cd_tema = $row["cod_tema"];
        $sql2 = "SELECT * FROM decoracoes WHERE temas_cod_tema = $cd_tema ";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
          // output data of each row
          while ($row2 = $result2->fetch_assoc()) {
        ?>
            <!-- Checkbox -->
            <label for="dec[]"><input type="checkbox" class="form-control" name="dec[]" value="<?php echo $row2["cod_decoracoes"] ?>" > <?php echo $row2["descricao_decoracao"] ?></label><br>
        <?php }
        } ?>
      </div>
    </div>
<?php
  }
} else {
  echo "0 results";
}
?>