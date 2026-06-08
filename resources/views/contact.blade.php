@extends('layouts.app')
@section('title', 'Studio Ser Design | Contato')
@section('content')
    <x-header title="Contato">
        <div class="header-content reveal">
            <h2 class="text-uppercase montserrat-200">Vamos criar juntos?</h2>
            <p class="header-text">
                No Studio, somos movidos por desafios e guiados pela curiosidade. Gostamos de explorar cada projeto a fundo,
                entendendo suas necessidades e possibilidades.
            </p>
            <p class="montserrat-400 header-cta">
                Para iniciarmos essa jornada juntos, preencha o formulário <br />e nos ajude a conhecer melhor você.
            </p>
            <a class="text-uppercase montserrat-300 header-link hover-underline">
                Começamos Aqui
            </a>
        </div>
    </x-header>
    <section class="contact-section">
        <form id="formulario">
            <fieldset>
                <legend class="reveal">Informações Básicas</legend>
                <div class="form-group two-columns reveal">
                    <div class="form-field">
                        <label>Como se chama?*</label>
                        <input type="text" class="form-input">
                    </div>

                    <div class="form-field">
                        <label>Telefone/WhatsApp*</label>
                        <input type="text" class="form-input">
                    </div>
                </div>
                <div class="form-group">
                    <label>Site ou Redes Sociais (se houver)</label>
                    <input type="text" class="form-input">
                </div>

                <legend class="reveal px-0" style="margin-top: 50px;">Sobre Você ou Sua Empresa</legend>
                <div class="form-group reveal">
                    <label>Qual das opções abaixo melhor descreve sua situação?*</label>
                    <select class="form-input">
                        <option value="" selected disabled>Selecione uma opção</option>
                        <option>Sou empreendedor(a) e busco algo para meu próprio negócio</option>
                        <option>Trabalho em uma empresa e surgiu uma oportunidade para um projeto</option>
                        <option>Estou começando com uma ideia de negócio e preciso de orientação</option>
                        <option>Outro (especificar)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Qual é o seu cargo ou função?*</label>
                    <input type="text" class="form-input">
                </div>
                <div class="form-group">
                    <label>Qual é o número de colaboradores da empresa?*</label>
                    <input type="number" class="form-input">
                </div>

                <legend class="reveal px-0" style="margin-top: 50px;">Sobre o Projeto</legend>
                <div class="form-group reveal">
                    <label>Você está buscando:*</label>
                    <select class="form-input">
                        <option value="" selected disabled>Selecione uma opção</option>
                        <option>Estratégia de Marca</option>
                        <option>Naming de Marca</option>
                        <option>Identidade Visual</option>
                        <option>Papelaria/ Digital</option>
                        <option>Interface de Site</option>
                        <option>Design de Produto</option>
                        <option>Modelo de Negócio</option>
                        <option>Planejamento Estratégico</option>
                        <option>Outro (especificar)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nos conte um pouco sobre o seu desafio, o que motivou você a procurar este serviço?*</label>
                    <textarea rows="4" class="form-input"></textarea>
                </div>

                <legend class="reveal px-0" style="margin-top: 50px;">Orçamento e Prazos</legend>
                <div class="form-group reveal">
                    <label>Você já tem um orçamento definido para este projeto?</label>
                    <div class="radio-group">
                        <label class="radio-item">
                            <input type="radio" name="decisao">
                            <span>Sim</span>
                        </label>

                        <label class="radio-item">
                            <input type="radio" name="decisao">
                            <span>Não, preciso de orientação</span>
                        </label>

                        <label class="radio-item">
                            <input type="radio" name="decisao">
                            <span>Prefiro discutir depois</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Há um prazo específico para a entrega?</label>
                    <div class="radio-group">
                        <label class="radio-item">
                            <input type="radio" name="prazo">
                            <span>Sim</span>
                        </label>

                        <label class="radio-item">
                            <input type="radio" name="prazo">
                            <span>Não tenho urgência</span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Como conheceu o Studio Ser Design?</label>
                    <textarea rows="4" class="form-input"></textarea>
                </div>

                <div class="form-group">
                    <label>Como podemos tornar essa experiência mais valiosa para você?</label>
                    <textarea rows="4" class="form-input"></textarea>
                </div>

                <div class="form-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="aceito">
                        <span>Aceito a política de privacidade do site.</span>
                    </label>
                </div>
                <p>
                    Seus dados estão seguros e protegidos. Garantimos a confidencialidade e a privacidade das
                    informações fornecidas.
                </p>

                <button class="send-button reveal mt-4">
                    Enviar
                </button>
            </fieldset>
        </form>
    </section>

    <script>
        document.querySelector('.header-link').addEventListener('click', function(e) {
            e.preventDefault();
            const form = document.querySelector('#formulario');
            if (form) {
                form.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    </script>



    <x-footer />
@endsection
