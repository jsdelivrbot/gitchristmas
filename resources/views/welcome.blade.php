<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>POSSIBLE GitChristmas</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/dist/css/skins/skin-blue.min.css') }}">

        <link rel="stylesheet" href="{{ asset('bower_components/components-font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/fastselect/dist/fastselect.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/plugins/select2/select2.min.css') }}">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            /*.content {*/
                 /*text-align: center;*/
             /*}*/

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .label {
                display: inline;
                padding: .2em .6em .3em;
                font-size: 100%;
                line-height: 1;
                color: #fff;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: .25em;
            }
            .fstElement {
                display: block;
                position: relative;
                border: 1px solid #D7D7D7;
                box-sizing: border-box;
                color: #232323;
                font-size: 0.8em;
                background-color: #fff;

            }
            .fstMultipleMode .fstControls {
                box-sizing: border-box;
                padding: 0.5em 0.5em 0em 0.5em;
                overflow: hidden;
                cursor: text;
                width: 100%;
                height: 40.6px;
            }
            .fstToggleBtn {
                font-size: 1em;
                display: block;
                position: relative;
                box-sizing: border-box;
                padding: .71429em 1.42857em .71429em .71429em;
                min-width: 14.28571em;
                cursor: pointer;
            }
            .fstResultItem {
                font-size: 1em;
                display: block;
                padding: .5em .71429em;
                margin: 0;
                cursor: pointer;
                border-top: 1px solid #fff;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div style="text-align: center;"><image src="{{asset('images/tree.gif')}}" height="300" width="300"></image></div>
                    <div class="title m-b-md">
                    POSSIBLE GitChristmas
                </div>
            {!! Form::open(['url' => '/app/save', 'class' => '', 'files' => true]) !!}

            <div class="box-body">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#git" data-toggle="tab"><i class="fa fa-git-square fa-2x"></i></a></li>
                            <li><a href="#hipchat" data-toggle="tab"><i class="fa fa-weixin fa-2x"></i></a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="active tab-pane" id="git">
                                <div class="form-group" style="padding-top: 10px;">
                                    <label>Repositórios*</label><br>
                                    <input type="text" multiple class="tagsInput"
                                           value=""
                                           @if ($responseRepositories)
                                           data-initial-value="{{ $responseRepositories }}"
                                           @endif
                                           data-user-option-allowed="true"
                                           data-url="git/getrepositories/tags.json"
                                           data-load-once="true"
                                           placeholder='Adicione um repositório'
                                           name="triggers-git"
                                    />
                                </div>
                            </div>
                            <div class="tab-pane" id="hipchat">
                                <div class="form-group" style="padding-top: 10px;">
                                    <label class="tree">Sala</label>
                                    <input type="text" class="form-control" value="#PELOTAS" disabled>
                                </div>
                                <div class="form-group" style="padding-top: 10px;">
                                    <label>Triggers*</label><br>
                                    <input type="text" multiple class="tagsInputHipchat"
                                           value=""
                                           @if ($responseTriggers)
                                           data-initial-value="{{ $responseTriggers }}"
                                           @endif
                                           data-user-option-allowed="true"
                                           data-url="hipchat/gettriggers/triggers.json"
                                           data-load-once="true"
                                           placeholder='Adicione uma palavra ou frase'
                                           name="triggers-hipchat"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary tree">Salvar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        </div>

        <!-- jQuery 2.1.4 -->
        <script src="{{ asset('bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bower_components/AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>



        <!-- AdminLTE App -->
        <script src="{{ asset('bower_components/AdminLTE/dist/js/app.min.js') }}"></script>
        <script src="{{ asset('bower_components/fastsearch/dist/fastsearch.js') }}"></script>
        <script src="{{ asset('bower_components/fastselect/dist/fastselect.js') }}"></script>

        <script>
            $.Fastselect.defaults = {

                elementClass: 'fstElement',
                singleModeClass: 'fstSingleMode',
                noneSelectedClass: 'fstNoneSelected',
                multipleModeClass: 'fstMultipleMode',
                queryInputClass: 'fstQueryInput',
                queryInputExpandedClass: 'fstQueryInputExpanded',
                fakeInputClass: 'fstFakeInput',
                controlsClass: 'fstControls',
                toggleButtonClass: 'fstToggleBtn',
                activeClass: 'fstActive',
                itemSelectedClass: 'fstSelected',
                choiceItemClass: 'fstChoiceItem',
                choiceRemoveClass: 'fstChoiceRemove',
                userOptionClass: 'fstUserOption',

                resultsContClass: 'fstResults',
                resultsOpenedClass: 'fstResultsOpened',
                resultsFlippedClass: 'fstResultsFilpped',
                groupClass: 'fstGroup',
                itemClass: 'fstResultItem',
                groupTitleClass: 'fstGroupTitle',
                loadingClass: 'fstLoading',
                noResultsClass: 'fstNoResults',
                focusedItemClass: 'fstFocused',

                matcher: null,

                url: null,
                loadOnce: false,
                apiParam: 'query',
                initialValue: null,
                clearQueryOnSelect: true,
                minQueryLength: 1,
                focusFirstItem: false,
                flipOnBottom: true,
                typeTimeout: 150,
                userOptionAllowed: false,
                valueDelimiter: ',',
                maxItems: null,

                parseData: null,
                onItemSelect: null,
                onItemCreate: null,
                onMaxItemsReached: null,

                placeholder: 'Escolha uma categoria',
                searchPlaceholder: 'Buscar',
                noResultsText: 'Nenhum resultado',
                userOptionPrefix: 'Adicionar '

            };
            $('.tagsInput').fastselect();
            $('.tagsInputHipchat').fastselect();
        </script>
    </body>
</html>
