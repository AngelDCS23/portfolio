<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/visualMode.js') }}"></script>
    <script>
        const marcadorOscuro = "{{ asset('img/iconos/marcadorClaro.png') }}";
        const marcadorClaro = "{{ asset('img/iconos/marcador.png') }}";
        const lunaOscuro = "{{ asset('img/iconos/luna.png') }}";
        const SolClaro = "{{ asset('img/iconos/sol.png') }}";
        const dinoOsc = "{{ asset('img/iconos/dinoOs.png') }}";
        const dinoCla = "{{ asset('img/iconos/dinoCla.png') }}";
    </script>

    <title>Ángel De Cara Salas</title>
</head>
<body>
    <div class="central50">
        <div class="menu">
            <a href="#about">{{ $menu->men1 }}</a>
            <a href="#experience">{{ $menu->men2 }}</a>
            <a href="#projects">{{ $menu->men3 }}</a>
            <a href="#skills">{{ $menu->men4 }}</a>
            <a href="#education">{{ $menu->men5 }}</a>
            <img src="{{ asset('img/iconos/luna.png') }}" class="socialIcon" onclick="toggleDarkMode()" id="visualModeButton">
        </div>

        <div class="menuMobile">
            <div class="men">
                <img src="{{ asset('img/iconos/menuOsc.png') }}" alt="" onclick="openMenu()">
                <img src="{{ asset('img/iconos/luna.png') }}" class="socialIcon" onclick="toggleDarkMode()" id="visualModeButton">
            </div>
        </div>

        <div id="sideMenu" class="side-menu">
            <div class="menu-header">
                <button onclick="closeMenu()">✕</button>
            </div>
            <div class="sideMenuMobile">
                <p>Contact information</p>
                <div class="infoRow" onclick="window.location.href='mailto:me@angeldcs.dev'">
                    <img src="{{ asset('img/iconos/sobre.png') }}" alt="">
                    <p>Email</p>
                </div>
                <div class="infoRow" onclick="window.open('https://github.com/AngelDCS23', '_blank')">
                    <img src="{{ asset('img/iconos/github.png') }}" alt="">
                    <p>GitHub</p>
                </div>
                <div class="infoRow" onclick="window.open('https://www.linkedin.com/in/%C3%A1ngel-de-cara-salas-413078227/', '_blank')">
                    <img src="{{ asset('img/iconos/linkedin.png') }}" alt="">
                    <p>Linkedin</p>
                </div>
            </div>
        </div>

        <div class="personalData" id="about">
            <div class="title">
                <p>about me</p>
            </div>
            <div class="basicInfo">
                <div class="left">
                    <div class="aboutCircle">
                        <img src="{{ asset('img/iconos/dinoCla.png') }}" alt="" id="dino">
                    </div>
                </div>
                <div class="right">
                    <h1>{{$person->name}}</h1>
                    <h2>{{$person->ocupation}}</h2>
                    <div class="rightImg">
                        <img src="{{ asset('img/iconos/marcador.png') }}" class="socialIcon" id="locationIcon">
                        <p>{{$person->place}}</p>
                    </div>
                </div>
            </div>
            <div class="aboutme">
                <p>{{$person->description}}</p>
            </div>
            <div class="socialLink">
                <div class="socialDiv" onclick="window.location.href='mailto:me@angeldcs.dev'">
                    <p><span class="spanEmail">{{$person->emailSpan}}</span>{{$person->email}}</p>
                </div>
                <div class="socialDiv" onclick="window.open('https://github.com/AngelDCS23', '_blank')">
                    <p><span class="spanGithub">{{$person->githubSpan}}</span>{{$person->github}}</p>
                </div>
                <div class="socialDiv" onclick="window.open('https://www.linkedin.com/in/%C3%A1ngel-de-cara-salas-413078227/', '_blank')">
                    <p><span class="spanLinkedin">{{$person->linkedinSpan}}</span>{{$person->linkedin}}</p>
                </div>
            </div>
        </div>   

        <div class="experience" id="experience">
            <div class="title">
                <p>experience</p>
            </div>
            @foreach ($experience as $exp)
                <div class="exp">
                    <p class="titleT">{{$exp->title}}</p>
                    <p class="subtitle">{{$exp->subtitle}}</p>
                    <p class="description">{{$exp->description}}</p>
                    <div class="skillsExp" id="{{$exp->id}}">
                        @if ($skillsExp->has($exp->id))
                        @foreach ($skillsExp[$exp->id] as $skill)
                            <div class="skillDiv">
                                <p>{{ $skill->skill }}</p>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="projects" id="projects">
            <div class="title">
                <p>projects</p>
            </div>
            @foreach ($projects as $project)
                <div class="exp">
                    <p class="titleT">{{$project->title}}</p>
                    <p class="description">{{$project->description}}</p>
                    <div class="skillsExp" id="{{$project->id}}">
                        @if ($skillsProjects->has($project->id))
                            @foreach ($skillsProjects[$project->id] as $skill)
                                <div class="skillDiv">
                                    <p>{{ $skill->skill }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="skills" id="skills">
            <div class="title">
                <p>skills</p>
            </div>
            <div class="skillsGrid">
                @foreach ($skills as $skill)
                    <div class="skillDiv">
                        <p>{{ $skill->skill }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="education" id="education">
            <div class="title">
                <p>education</p>
            </div>
            @foreach ($education as $edu)
                <div class="eduRow" onclick="window.open('{{$edu->web}}', '_blank')">
                    <div class="eduData">
                        <p class="titleT">{{$edu->title}}</p>
                        <p class="eduTitle">{{$edu->subtitle}}</p>
                    </div>
                    <div class="eduDate">
                        <p>{{$edu->initDate.' - '. $edu->endDate}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <footer>
            <div class="footerDiv">
                <p>© 2025 - Ángel De Cara Salas</p>
            </div>
        </footer>

    </div>
    <div class="contact-btn" onclick="window.location.href='mailto:me@angeldcs.dev'">
        <p>Contact Me</p>
    </div>
</body>

<script>
    function openMenu() {
      document.getElementById('sideMenu').classList.add('open');
    }
  
    function closeMenu() {
      document.getElementById('sideMenu').classList.remove('open');
    }
  </script>


</html>