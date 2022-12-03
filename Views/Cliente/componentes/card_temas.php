

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
<?php foreach ($_SESSION["Temas"] as $indice => $tema) { ?>
  <!-- <div class="relative group w-96 h-96 overflow-hidden bg-black m-auto mt-36">
  <img class="object-cover w-full h-full transform duration-700 backdrop-opacity-100" src="<?php echo $tema->img ?>" />
  <div class="absolute w-full h-full shadow-2xl opacity-20 transform duration-500 inset-y-full group-hover:-inset-y-0"></div>
  <div class="absolute bg-gradient-to-t from-black w-full h-full transform duration-500 inset-y-3/4 group-hover:-inset-y-0">
    <div class="absolute w-full flex place-content-center">
      <p class="capitalize font-serif font-bold text-3xl text-center shadow-2xl text-white mt-10"><?php echo $tema->desc ?></p>
    </div>

    <button class="absolute left-1/4 bottom-4 bg-white text-black font-bold rounded-lg h-10 w-48">Acessar</button>
  </div>
</div> -->

<div class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg m-3">
    <img class="object-cover w-full h-56" src="<?php echo $tema->img ?>" alt="avatar">

    <div class="py-5 text-center">
        <span href="" class="block text-2xl font-bold text-gray-800 " tabindex="0" role="link"><?php echo $tema->desc ?></span>
        <span class="text-sm text-gray-700"></span>
    </div>
</div>

<?php } ?>