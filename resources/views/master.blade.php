<!DOCTYPE html>
<html>
    <head>
        @include('header')
        @yield('testa')
        <title>@yield("titolo")</title>
    </head>

    <body>
        <div id="wrapper">
            
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/amministrazione/dashboard">StoryMap</a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li><a href="/amministrazione/impostazioni"><i class="fa fa-gear fa-fw"></i> Impostazioni</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="/amministrazione/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>


                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="/amministrazione/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Luoghi<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/amministrazione/modificamarker">Visualizza luoghi</a>
                                    </li>
                                    <li>
                                        <a href="/amministrazione/inserimentomarker">Aggiungi luogo</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> Immagini<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/amministrazione/mostraimmagini">Visualizza immagini</a>
                                    </li>
                                    <li>
                                        <a href="/amministrazione/InserisciImmagine">Inserisci Immagine</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Utenti<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/amministrazione/listautenti">Lista utenti</a>
                                    </li>
                                    <li>
                                        <a href="/amministrazione/registrazione">Aggiungi utenti</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                @yield("corpo")
            </div>
        </div>
        
        @include('footer')
    </body>

</html>
