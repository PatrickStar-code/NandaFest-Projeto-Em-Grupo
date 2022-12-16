<!--
  This component uses @tailwindcss/forms

  yarn add @tailwindcss/forms
  npm install @tailwindcss/forms

  plugins: [require('@tailwindcss/forms')]
-->

<footer aria-label="Site Footer" class="bg-white">
    <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2">
            <div class="py-8 border-b border-gray-100 lg:order-last lg:border-b-0 lg:border-l lg:py-16 lg:pl-16">
                <div class="block text-teal-600 lg:hidden">
                    <img src="<?php $_SESSION["Empresa"]->img ?>" alt="" srcset="">
                </div>

                <div class="mt-8 space-y-4 lg:mt-0">
                    

                    <div>
                    <a href="" ><img src="../Imgs/seguir.png" alt="" srcset=""></a>
                    </div>

                    
                </div>
            </div>

            <div class="py-8 lg:py-16 lg:pr-16">
                <div class="hidden text-teal-600 lg:block">
                  <img src="<?php $_SESSION["Empresa"]->img ?>" alt="">
                </div>

                <div class="grid grid-cols-1 gap-8 mt-8 sm:grid-cols-3">
                    <div>
                        <p class="font-medium text-gray-900">Institucional</p>

                        <nav aria-label="Footer Navigation - Services" class="mt-6">
                            <ul class="space-y-4 text-sm">
                                <li>
                                    <a href="./sobre_nos.php" class="text-gray-700 transition hover:opacity-75">
                                        Quem Somos
                                    </a>
                                </li>

                                <li>
                                    <a href="./sobre_nos.php"class="text-gray-700 transition hover:opacity-75">
                                        Onde Estamos
                                    </a>
                                </li>

                                <li>
                                    <a href="./sobre_nos.php" class="text-gray-700 transition hover:opacity-75">
                                        Sobre Nós
                                    </a>
                                </li>

                                <li>
                                    <a href="./sobre_nos.php" class="text-gray-700 transition hover:opacity-75">
                                        Nossa Empressa
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                                        Depoimentos
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div>
                        <p class="font-medium text-gray-900">Precisa de Ajuda?</p>

                        <nav aria-label="Footer Navigation - Company" class="mt-6">
                            <ul class="space-y-4 text-sm">
                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                                        Política de Envio e Entrega
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                                        Política de Segurança
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                                        Trocas e Devoluções
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                                        Como Alugar
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div>
                        <p class="font-medium text-gray-900">Fale Conosco</p>

                        <nav aria-label="Footer Navigation - Company" class="mt-6">
                            <ul class="space-y-4 text-sm">
                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                                        Seg. a Sex. das 08:30 as 18:30h
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                                        <img src="https://images.tcdn.com.br/files/807559/themes/15/img/whats-footer.png" alt="" srcset="">(32) 1234 5678
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                                        <img src="	https://images.tcdn.com.br/files/807559/themes/15/img/mail-footer.png" alt="" srcset="">nanda@mail.com
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
</footer>