<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect width='32' height='32' rx='8' fill='%231e40af'/%3E%3Cpath d='M10 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0zm6-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8z' fill='%23fff'/%3E%3C/svg%3E">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net/">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
            }
            .floating {
                animation: float 3s ease-in-out infinite;
            }
            .pcb-bg {
                background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="none" stroke="%231e40af" stroke-width="0.5"/><circle cx="20" cy="20" r="1" fill="%231e40af"/><circle cx="50" cy="20" r="1" fill="%231e40af"/><circle cx="80" cy="20" r="1" fill="%231e40af"/><circle cx="20" cy="50" r="1" fill="%231e40af"/><circle cx="50" cy="50" r="1" fill="%231e40af"/><circle cx="80" cy="50" r="1" fill="%231e40af"/><circle cx="20" cy="80" r="1" fill="%231e40af"/><circle cx="50" cy="80" r="1" fill="%231e40af"/><circle cx="80" cy="80" r="1" fill="%231e40af"/></svg>');
                background-size: 100px 100px;
            }
            .terminal {
                font-family: 'Courier New', monospace;
                background-color: #1a1a1a;
                color: #00ff00;
                border-radius: 8px;
                padding: 1rem;
                position: relative;
                overflow: hidden;
            }
            .terminal::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 30px;
                background: linear-gradient(to right, #ff0000, #ffff00, #00ff00, #00ffff, #0000ff, #ff00ff, #ff0000);
                opacity: 0.2;
            }
            .cursor {
                animation: blink 1s step-end infinite;
            }
            @keyframes blink {
                from, to { opacity: 1; }
                50% { opacity: 0; }
            }
            .hexagon {
                clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            }
            .pcb-trace {
                position: relative;
            }
            .pcb-trace::after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(90deg, transparent, rgba(30, 64, 175, 0.3), transparent);
                animation: trace 3s linear infinite;
            }
            @keyframes trace {
                0% { transform: translateX(-100%); }
                100% { transform: translateX(100%); }
            }
        </style>
    @endif
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen pcb-bg font-sans antialiased">
    <div class="container mx-auto px-4 py-12">
        <!-- Hero Section -->
        <section class="mb-24 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-12 md:mb-0">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Hello, I'm <span class="text-blue-400">Alessandro</span>
                </h2>
                <h3 class="text-2xl md:text-3xl font-light mb-6 text-blue-300">
                    Embedded Software Engineering Undergraduate
                </h3>
                <p class="text-gray-400 mb-8 max-w-lg">
                    I'm a italian UniBo student currently majoring CS and Engineering with a great passion about Embedded Systems and Machine Learing.
                </p>
                <div class="flex space-x-4">
                    <a href="#contact" class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium transition">
                        Contact Me
                    </a>
                    <a href="#projects" class="border border-blue-600 text-blue-400 hover:bg-blue-900/30 px-6 py-3 rounded-lg font-medium transition">
                        View Projects
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="relative w-64 h-64">
                    <div class="absolute inset-0 bg-blue-900/20 rounded-full blur-xl"></div>
                    <div class="relative w-full h-full flex items-center justify-center">
                        <div class="w-48 h-48 bg-gradient-to-br from-blue-600 to-blue-900 rounded-full flex items-center justify-center floating">
                            <div class="w-40 h-40 bg-blue-800 rounded-full flex items-center justify-center">
                                <div class="w-32 h-32 bg-blue-700 rounded-full flex items-center justify-center">
                                    <i class="fas fa-microchip text-5xl text-blue-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="mb-24">
            <h2 class="text-3xl font-bold mb-8 flex items-center">
                <span class="w-8 h-0.5 bg-blue-500 mr-4"></span>
                About Me
            </h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="terminal p-6">
                    <div class="flex mb-4">
                        <div class="w-3 h-3 rounded-full bg-red-500 mr-2"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    </div>
                    <div class="mb-2">&gt; alessandro --profile</div>
                    <div class="mb-2">Name: Alessandro Porcheddu</div>
                    <div class="mb-2">Specialization: Embedded Systems</div>
                    <div class="mb-2">Languages: Italian, English</div>
                    <div class="mb-2">Education: B.Sc. CS and Engineering</div>
                    <div class="mb-2">&gt; skills --list</div>
                    <div class="mb-2">- C/C++</div>
                    <div class="mb-2">- RTOS</div>
                    <div class="mb-2">- PCB Design (KiCad)</div>
                    <div class="mb-2">- CAN, SPI, I2C</div>
                    <div class="mb-2">&gt; _</div>
                </div>
                <div>
                    <p class="text-gray-400 mb-6">
                        I'm passionate about motorsport, creative thinking and problem solving. 
                        My journey began with Arduino projects, moving into ESP32 and STM32 based designings for hoobist and automotive applications.
                    </p>
                    <p class="text-gray-400 mb-6">I'm naturally curious and passionate about learning, with a strong interest in exploring 3D printing, CAD modeling, and machine learning. I enjoy diving into new technologies and continuously expanding my skill set through hands-on projects and experimentation.</p>
                    <p class="text-gray-400 mb-6">When I'm not around firmware or electronics, I'm usually in the garage working on cars or motorcycles. I enjoy blending tech with mechanics and tuning engine or experimenting with ways to integrate smart systems into vehicles.</p>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center bg-blue-900/30 px-4 py-2 rounded-lg">
                            <i class="fas fa-bolt text-blue-400 mr-2"></i>
                            <span>Lightning-fast Software</span>
                        </div>
                        <div class="flex items-center bg-blue-900/30 px-4 py-2 rounded-lg">
                            <i class="fas fa-project-diagram text-blue-400 mr-2"></i>
                            <span>IoT Solutions</span>
                        </div>
                        <div class="flex items-center bg-blue-900/30 px-4 py-2 rounded-lg">
                            <i class="fas fa-code text-blue-400 mr-2"></i>
                            <span>Firmware Optimization</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="mb-24">
            <h2 class="text-3xl font-bold mb-8 flex items-center">
                <span class="w-8 h-0.5 bg-blue-500 mr-4"></span>
                Featured Projects
            </h2>
            
            <!-- Interactive PCB Viewer -->
            <div class="mb-16 bg-gray-800 rounded-xl overflow-hidden">
                <div class="p-6 border-b border-gray-700 flex items-center">
                    <div class="w-3 h-3 rounded-full bg-red-500 mr-2"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></div>
                    <div class="w-3 h-3 rounded-full bg-green-500 mr-4"></div>
                    <div class="text-sm text-gray-400">pcb_viewer.html</div>
                </div>
                <div class="p-6 md:p-8">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">Motorcycle CDI ECU</h3>
                            <p class="text-gray-400 mb-4">
                                Custom PCB with ESP32 microcontroller, WiFi interface and WebSocker communication, multiple sensors and ICs.
                                3D printed case designed with Fusion 360.
                                Easy to use web interface to configure the ECU.
                                Remote updates and version control with custom OTA server.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="text-xs bg-blue-900/50 text-blue-300 px-3 py-1 rounded-full">ESP32</span>
                                <span class="text-xs bg-blue-900/50 text-blue-300 px-3 py-1 rounded-full">WebSocket</span>
                                <span class="text-xs bg-blue-900/50 text-blue-300 px-3 py-1 rounded-full">KiCad</span>
                                <span class="text-xs bg-blue-900/50 text-blue-300 px-3 py-1 rounded-full">Sensors</span>
                            </div>
                            <button class="text-blue-400 hover:text-blue-300 flex items-center" onclick="window.location.hash = 'projects';">
                                <a href="#projects" class="flex items-center">
                                    View Project Details
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </button>
                        </div>
                        <div class="relative">
                            <div class="pcb-trace bg-gray-700 rounded-lg overflow-hidden">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='400' height='300' viewBox='0 0 400 300'><rect width='400' height='300' fill='%232d3748'/><rect x='50' y='50' width='300' height='200' fill='%231a202c'/><rect x='70' y='70' width='260' height='160' fill='%232d3748'/><circle cx='100' cy='100' r='8' fill='%234a5568'/><circle cx='300' cy='100' r='8' fill='%234a5568'/><circle cx='100' cy='200' r='8' fill='%234a5568'/><circle cx='300' cy='200' r='8' fill='%234a5568'/><path d='M100,100 L300,100 L300,200 L100,200 Z' fill='none' stroke='%233b82f6' stroke-width='4' stroke-dasharray='10,5'/><path d='M100,100 L100,200' fill='none' stroke='%233b82f6' stroke-width='4'/><path d='M300,100 L300,200' fill='none' stroke='%233b82f6' stroke-width='4'/><rect x='150' y='120' width='100' height='60' fill='%233b82f6' opacity='0.2'/><text x='200' y='150' font-family='Arial' font-size='14' fill='white' text-anchor='middle'>MCU</text></svg>" 
                                     alt="PCB Design" class="w-full h-auto rounded-lg">
                            </div>
                            <div class="absolute bottom-4 right-4 flex space-x-2">
                                <button class="bg-blue-600 hover:bg-blue-700 w-8 h-8 rounded-full flex items-center justify-center">
                                    <i class="fas fa-search-plus text-xs"></i>
                                </button>
                                <button class="bg-gray-700 hover:bg-gray-600 w-8 h-8 rounded-full flex items-center justify-center">
                                    <i class="fas fa-layer-group text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Projects -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-gray-800 rounded-lg overflow-hidden hover:transform hover:-translate-y-2 transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-blue-900 to-blue-700 flex items-center justify-center">
                        <i class="fas fa-gauge text-5xl text-blue-300"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold mb-2">Ignition Advance Meter</h3>
                        <p class="text-gray-400 text-sm mb-4">
                            Real-time measurement and display of ignition advance for performance tuning and diagnostics.
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                <span class="text-xs bg-blue-900/50 text-blue-300 px-2 py-1 rounded">STM32</span>
                                <span class="text-xs bg-blue-900/50 text-blue-300 px-2 py-1 rounded">CAN</span>
                            </div>
                            <button class="text-blue-400 hover:text-blue-300 text-sm" onclick="window.location.hash = 'projects';">
                                <a href="#projects" class="text-blue-400 hover:text-blue-300 text-sm">Details</a>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg overflow-hidden hover:transform hover:-translate-y-2 transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-purple-900 to-blue-700 flex items-center justify-center">
                        <i class="fas fa-fan text-5xl text-purple-300"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold mb-2">Exhaust Valve Controller</h3>
                        <p class="text-gray-400 text-sm mb-4">
                            Electronic control of exhaust valves for optimized performance and sound management in motorcycles.
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                <span class="text-xs bg-blue-900/50 text-blue-300 px-2 py-1 rounded">ESP32</span>
                                <span class="text-xs bg-blue-900/50 text-blue-300 px-2 py-1 rounded">PWM</span>
                            </div>
                            <button class="text-blue-400 hover:text-blue-300 text-sm" onclick="window.location.hash = 'projects';">
                                <a href="#projects" class="text-blue-400 hover:text-blue-300 text-sm">Details</a>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg overflow-hidden hover:transform hover:-translate-y-2 transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-green-900 to-blue-700 flex items-center justify-center">
                        <i class="fas fa-bolt text-5xl text-green-300"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold mb-2">Motorcycle Quickshifter</h3>
                        <p class="text-gray-400 text-sm mb-4">
                            Seamless gear shifting for motorcycles using sensor-based quickshifter technology.
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                <span class="text-xs bg-blue-900/50 text-blue-300 px-2 py-1 rounded">C</span>
                                <span class="text-xs bg-blue-900/50 text-blue-300 px-2 py-1 rounded">Sensors</span>
                            </div>
                            <button class="text-blue-400 hover:text-blue-300 text-sm" onclick="window.location.hash = 'projects';">
                                <a href="#projects" class="text-blue-400 hover:text-blue-300 text-sm">Details</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" class="mb-24">
            <h2 class="text-3xl font-bold mb-8 flex items-center">
                <span class="w-8 h-0.5 bg-blue-500 mr-4"></span>
                Skills & Technologies
            </h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Microcontrollers -->
                <div class="bg-gray-800/50 p-6 rounded-xl border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-900 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-microchip text-blue-300"></i>
                        </div>
                        <h3 class="text-xl font-bold">Microcontrollers</h3>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-gray-400">ESP32</span>
                                <span class="text-sm text-blue-400">90%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-gray-400">Arduino</span>
                                <span class="text-sm text-blue-400">85%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-gray-400">STM32</span>
                                <span class="text-sm text-blue-400">75%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Languages -->
                <div class="bg-gray-800/50 p-6 rounded-xl border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-900 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-code text-blue-300"></i>
                        </div>
                        <h3 class="text-xl font-bold">Languages</h3>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-gray-400">C</span>
                                <span class="text-sm text-blue-400">95%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 95%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-gray-400">C++</span>
                                <span class="text-sm text-blue-400">85%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-gray-400">Python</span>
                                <span class="text-sm text-blue-400">70%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Tools -->
                <div class="bg-gray-800/50 p-6 rounded-xl border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-900 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-tools text-blue-300"></i>
                        </div>
                        <h3 class="text-xl font-bold">Tools</h3>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="flex items-center bg-gray-700/50 px-3 py-2 rounded-lg">
                            <i class="fas fa-project-diagram text-blue-400 mr-2"></i>
                            <span class="text-sm">KiCad</span>
                        </div>
                        <div class="flex items-center bg-gray-700/50 px-3 py-2 rounded-lg">
                            <i class="fas fa-bolt text-blue-400 mr-2"></i>
                            <span class="text-sm">Oscilloscope</span>
                        </div>
                        <div class="flex items-center bg-gray-700/50 px-3 py-2 rounded-lg">
                            <i class="fas fa-plug text-blue-400 mr-2"></i>
                            <span class="text-sm">Fusion360</span>
                        </div>
                        <div class="flex items-center bg-gray-700/50 px-3 py-2 rounded-lg">
                            <i class="fas fa-terminal text-blue-400 mr-2"></i>
                            <span class="text-sm">GDB</span>
                        </div>
                        <div class="flex items-center bg-gray-700/50 px-3 py-2 rounded-lg">
                            <i class="fab fa-git-alt text-blue-400 mr-2"></i>
                            <span class="text-sm">Git</span>
                        </div>
                        <div class="flex items-center bg-gray-700/50 px-3 py-2 rounded-lg">
                            <i class="fas fa-code-branch text-blue-400 mr-2"></i>
                            <span class="text-sm">RTOS</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="mb-16">
            <h2 class="text-3xl font-bold mb-8 flex items-center">
                <span class="w-8 h-0.5 bg-blue-500 mr-4"></span>
                Get In Touch
            </h2>
            
            <div>
                    <p class="text-gray-400 mb-8">
                        Interested in working together or have questions about embedded systems? 
                        Feel free to reach out through any of the channels below.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-900/30 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-envelope text-blue-400"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400">Email</div>
                                <div class="font-medium"><a href="mailto:contact@0xpuddu.it" class="hover:underline text-blue-300">contact@0xpuddu.it</a></div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-900/30 rounded-full flex items-center justify-center mr-4">
                                <i class="fab fa-github text-blue-400"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400">GitHub</div>
                                <div class="font-medium"><a href="https://github.com/D3stan" target="_blank" rel="noopener" class="hover:underline text-blue-300">github.com/D3stan</a></div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-900/30 rounded-full flex items-center justify-center mr-4">
                                <i class="fab fa-linkedin-in text-blue-400"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400">LinkedIn</div>
                                <div class="font-medium"><a href="https://linkedin.com/in/0xalessandro-porcheddu" target="_blank" rel="noopener" class="hover:underline text-blue-300">linkedin.com/in/0xalessandro-porcheddu</a></div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
    </div>

    <script>
        // Improved terminal typing effect
        // Types each line smoothly, cursor always at the end, no glitches

        document.addEventListener('DOMContentLoaded', function() {
            const terminalText = [
                '> alessandro --profile',
                'Name: Alessandro Porcheddu',
                'Specialization: Embedded Systems',
                'Languages: Italian, English',
                'Education: B.Sc. CS and Engineering',
                '> skills --list',
                '- C/C++',
                '- RTOS',
                '- PCB Design (KiCad)',
                '- CAN, SPI, I2C',
                '> _'
            ];

            const terminal = document.querySelector('.terminal');
            if (terminal) {
                let currentLine = 0;
                let currentChar = 0;
                let typing = false;
                let interval = null;
                let lines = [];

                // Clear and initialize terminal
                function initTerminal() {
                    terminal.innerHTML = `
                        <div class="flex mb-4">
                            <div class="w-3 h-3 rounded-full bg-red-500 mr-2"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <div class="mb-2"></div>
                    `;
                    lines = Array.from(terminal.querySelectorAll('div.mb-2'));
                    currentLine = 0;
                    currentChar = 0;
                }

                function typeTerminal() {
                    typing = true;
                    // Remove all lines except the color bar
                    const colorBar = terminal.querySelector('.flex.mb-4');
                    terminal.innerHTML = '';
                    if (colorBar) terminal.appendChild(colorBar);
                    lines = [];
                    // Add empty lines for each terminalText line
                    for (let i = 0; i < terminalText.length; i++) {
                        const lineDiv = document.createElement('div');
                        lineDiv.className = 'mb-2';
                        terminal.appendChild(lineDiv);
                        lines.push(lineDiv);
                    }
                    // Add the blinking cursor span to the last line
                    const cursorSpan = document.createElement('span');
                    cursorSpan.className = 'cursor';
                    cursorSpan.textContent = '|';
                    lines[lines.length - 1].appendChild(cursorSpan);

                    currentLine = 0;
                    currentChar = 0;
                    // Start typing
                    interval = setInterval(() => {
                        if (currentLine < terminalText.length) {
                            const line = terminalText[currentLine];
                            // Remove cursor from all lines
                            lines.forEach((l, idx) => {
                                const c = l.querySelector('.cursor');
                                if (c) c.remove();
                            });
                            // Type next character
                            lines[currentLine].textContent = line.substring(0, currentChar + 1);
                            // Add cursor to current line
                            const cursor = document.createElement('span');
                            cursor.className = 'cursor';
                            cursor.textContent = '|';
                            lines[currentLine].appendChild(cursor);
                            currentChar++;
                            if (currentChar > line.length) {
                                // Line done, move to next
                                currentLine++;
                                currentChar = 0;
                            }
                        } else {
                            // Typing done, cursor stays at end
                            clearInterval(interval);
                            typing = false;
                            setTimeout(() => {
                                initTerminal();
                                setTimeout(typeTerminal, 1000);
                            }, 3000);
                        }
                    }, 40);
                }

                initTerminal();
                setTimeout(typeTerminal, 1000);
            }

            // PCB trace animation toggle
            const pcbTrace = document.querySelector('.pcb-trace');
            if (pcbTrace) {
                pcbTrace.addEventListener('click', function() {
                    this.classList.toggle('pcb-trace');
                });
            }

            // Smooth scrolling for navigation
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>