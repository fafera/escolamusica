<!doctype html>
<html lang="pt-br">
    @component('components.header')

    @endcomponent
    @component('components.scripts')

    @endcomponent
    <body id="page-top">
        <div id="wrapper">
            @auth
                @component('components.sidebar')

                @endcomponent
            @endauth
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @auth
                        @component('components.navbar')

                        @endcomponent
                    @endauth
                    {{-- @guest
                        @component('components.login-navbar')

                        @endcomponent
                    @endguest --}}

                    <div class="container-fluid">
                        @component('components.message')

                        @endcomponent

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $.extend($.fn.dataTable.defaults, {
                language: { url: "{{asset('js/pt_br.json')}}" }
            });
            $.extend($.fn.datepicker.dates['pt-BR'] = {
                    months: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho',
                    'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthsShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                    'Jul','Ago','Set','Out','Nov','Dez'],
                    days: ['Domingo','Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sábado'],
                    daysShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                    daysMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                    today: 'Hoje',
                    clear: 'Limpar',
                    format: 'dd/mm/yyyy',
                    titleFormat: 'MM - yyyy',
                    weekStart: 0
                });
            $.extend(
                $.fn.datepicker.defaults.language = 'pt-BR',
                $.fn.datepicker.defaults.autoclose = true
            );
        </script>
        @stack('scripts_src')
        <script type="text/javascript">
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                    }
                });


                (function($){

                    @stack('scripts')
                }(jQuery));

            });

        </script>
    </body>
</html>