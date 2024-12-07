<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Instant Invitation Letters | Decedat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Add AOS for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <style>
        .gradient-text {
            background: linear-gradient(to right, #3b82f6, #2563eb, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #0ea5e9, #2563eb, #4f46e5);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .nav-blur {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Navigation -->
    <nav class="nav-blur fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" class="text-3xl font-extrabold gradient-text">Decedat</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 transition-colors duration-300 font-medium">HOME</a>
                    <a href="#about" class="text-gray-700 hover:text-blue-600 transition-colors duration-300 font-medium">ABOUT</a>
                    <a href="#legal" class="text-gray-700 hover:text-blue-600 transition-colors duration-300 font-medium">LEGAL</a>
                    <a href="#faqs" class="text-gray-700 hover:text-blue-600 transition-colors duration-300 font-medium">FAQs</a>
                    <a href="#contact" 
                       class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 
                              transition-all duration-300 transform hover:scale-105 font-medium">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient min-h-screen flex items-center pt-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-1/2 text-white" data-aos="fade-right">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        Your Gateway to Global Travel
                    </h1>
                    <p class="text-xl mb-8 text-blue-100">
                        Get instant, legally recognized invitation letters for your international travel needs.
                        Simple, fast, and reliable.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#application" 
                           class="bg-white text-blue-600 px-8 py-4 rounded-full font-bold 
                                  hover:bg-blue-50 transition-all duration-300 transform hover:scale-105">
                            Start Now - $55
                        </a>
                        <a href="#how-it-works" 
                           class="border-2 border-white text-white px-8 py-4 rounded-full font-bold 
                                  hover:bg-white hover:text-blue-600 transition-all duration-300">
                            Learn More
                        </a>
                    </div>
                    <div class="mt-12 flex items-center space-x-8">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-2xl mr-2"></i>
                            <span>Instant Processing</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-shield-alt text-2xl mr-2"></i>
                            <span>100% Legal</span>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 mt-12 lg:mt-0" data-aos="fade-left">
                    <div class="relative">
                        <div class="floating">
                            <!-- Replace with your hero image -->
                            <img src="assets/images/hero-illustration.svg" alt="Travel Illustration" 
                                 class="w-full max-w-lg mx-auto">
                        </div>
                        <!-- Decorative elements -->
                        <div class="absolute top-0 right-0 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob"></div>
                        <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-2000"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0 bg-gradient-to-b from-blue-50 to-white opacity-70"></div>
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-100 rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-100 rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>

        <div class="container mx-auto px-4 relative">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-blue-600 font-semibold text-sm tracking-wider uppercase">Why Choose Us</span>
                <h2 class="text-4xl font-bold mb-4 gradient-text mt-2">Features that Set Us Apart</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Experience a seamless and professional service backed by cutting-edge technology
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 relative">
                <!-- Feature Card 1 -->
                <div class="feature-card group" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                            <i class="fas fa-globe text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">Global Coverage</h3>
                        <p class="text-gray-600 leading-relaxed">Access to invitation letters for multiple countries including USA, UK, Canada, and more.</p>
                        <div class="mt-6 flex items-center text-blue-600 font-semibold">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="feature-card group" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                            <i class="fas fa-bolt text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">Instant Processing</h3>
                        <p class="text-gray-600 leading-relaxed">Get your invitation letter instantly after verification. No waiting time required.</p>
                        <div class="mt-6 flex items-center text-purple-600 font-semibold">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="feature-card group" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                            <i class="fas fa-shield-alt text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">100% Legal</h3>
                        <p class="text-gray-600 leading-relaxed">All our invitation letters are legally recognized and comply with international standards.</p>
                        <div class="mt-6 flex items-center text-indigo-600 font-semibold">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 4 -->
                <div class="feature-card group" data-aos="fade-up" data-aos-delay="400">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                            <i class="fas fa-headset text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">24/7 Support</h3>
                        <p class="text-gray-600 leading-relaxed">Round-the-clock customer support to assist you with any queries or concerns.</p>
                        <div class="mt-6 flex items-center text-green-600 font-semibold">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 5 -->
                <div class="feature-card group" data-aos="fade-up" data-aos-delay="500">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                            <i class="fas fa-file-signature text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">Multiple Letter Types</h3>
                        <p class="text-gray-600 leading-relaxed">Various types of invitation letters available for different purposes and requirements.</p>
                        <div class="mt-6 flex items-center text-red-600 font-semibold">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 6 -->
                <div class="feature-card group" data-aos="fade-up" data-aos-delay="600">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                            <i class="fas fa-lock text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">Secure Process</h3>
                        <p class="text-gray-600 leading-relaxed">End-to-end encrypted process ensuring your data remains safe and confidential.</p>
                        <div class="mt-6 flex items-center text-yellow-600 font-semibold">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8" data-aos="fade-up">
                <div class="text-center">
                    <div class="text-4xl font-bold gradient-text mb-2" data-count="50000">0</div>
                    <p class="text-gray-600">Happy Clients</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold gradient-text mb-2" data-count="100">0</div>
                    <p class="text-gray-600">Countries Covered</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold gradient-text mb-2" data-count="99.9">0</div>
                    <p class="text-gray-600">Success Rate</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold gradient-text mb-2" data-count="24">0</div>
                    <p class="text-gray-600">Hour Support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-purple-50"></div>
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-1/3 h-1/3 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 1s;"></div>

        <div class="container mx-auto px-4 relative">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-blue-600 font-semibold text-sm tracking-wider uppercase">Simple Process</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4 gradient-text mt-2">How It Works</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Get your invitation letter in three simple steps, all within minutes
                </p>
            </div>

            <!-- Steps Container -->
            <div class="max-w-6xl mx-auto">
                <!-- Step 1 -->
                <div class="flex flex-col md:flex-row items-center mb-20 group" data-aos="fade-right">
                    <div class="w-full md:w-1/2 md:pr-12 mb-8 md:mb-0">
                        <div class="bg-white p-8 rounded-2xl shadow-lg transform group-hover:-translate-y-2 transition-all duration-300">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center mb-6 transform group-hover:rotate-6 transition-transform duration-300">
                                <span class="text-3xl text-white font-bold">1</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-gray-800">Fill Application</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Complete our user-friendly online form with your details:
                            </p>
                            <ul class="space-y-3">
                                <li class="flex items-center text-gray-600">
                                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                    Personal Information
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                    Travel Details
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                    Purpose of Visit
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <img src="assets/images/form-illustration.svg" alt="Fill Application" 
                             class="w-full max-w-md mx-auto transform group-hover:scale-105 transition-transform duration-300">
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col md:flex-row-reverse items-center mb-20 group" data-aos="fade-left">
                    <div class="w-full md:w-1/2 md:pl-12 mb-8 md:mb-0">
                        <div class="bg-white p-8 rounded-2xl shadow-lg transform group-hover:-translate-y-2 transition-all duration-300">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl flex items-center justify-center mb-6 transform group-hover:rotate-6 transition-transform duration-300">
                                <span class="text-3xl text-white font-bold">2</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-gray-800">Make Payment</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Secure payment processing with multiple options:
                            </p>
                            <div class="grid grid-cols-3 gap-4 mb-6">
                                <div class="flex items-center justify-center p-4 bg-gray-50 rounded-lg">
                                    <i class="fab fa-cc-visa text-2xl text-blue-600"></i>
                                </div>
                                <div class="flex items-center justify-center p-4 bg-gray-50 rounded-lg">
                                    <i class="fab fa-cc-mastercard text-2xl text-red-600"></i>
                                </div>
                                <div class="flex items-center justify-center p-4 bg-gray-50 rounded-lg">
                                    <i class="fab fa-cc-amex text-2xl text-blue-800"></i>
                                </div>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-shield-alt text-green-500 mr-3"></i>
                                Secure SSL Encrypted Payment
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <img src="assets/images/payment-illustration.svg" alt="Make Payment" 
                             class="w-full max-w-md mx-auto transform group-hover:scale-105 transition-transform duration-300">
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col md:flex-row items-center group" data-aos="fade-right">
                    <div class="w-full md:w-1/2 md:pr-12 mb-8 md:mb-0">
                        <div class="bg-white p-8 rounded-2xl shadow-lg transform group-hover:-translate-y-2 transition-all duration-300">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mb-6 transform group-hover:rotate-6 transition-transform duration-300">
                                <span class="text-3xl text-white font-bold">3</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-gray-800">Get Your Letter</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Receive your invitation letter instantly:
                            </p>
                            <ul class="space-y-3">
                                <li class="flex items-center text-gray-600">
                                    <i class="fas fa-download text-green-500 mr-3"></i>
                                    Instant Download
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <i class="fas fa-envelope text-green-500 mr-3"></i>
                                    Email Delivery
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <i class="fas fa-print text-green-500 mr-3"></i>
                                    Print Ready Format
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <img src="assets/images/letter-illustration.svg" alt="Get Letter" 
                             class="w-full max-w-md mx-auto transform group-hover:scale-105 transition-transform duration-300">
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-16" data-aos="fade-up">
                <a href="#application" 
                   class="inline-flex items-center px-8 py-4 text-lg font-bold text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-full hover:from-blue-700 hover:to-blue-800 transform hover:scale-105 transition-all duration-300">
                    <span>Start Your Application</span>
                    <i class="fas fa-arrow-right ml-3"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Countries Section -->
    <section class="py-20 relative overflow-hidden bg-gradient-to-br from-gray-50 to-white">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-50 rounded-full filter blur-3xl opacity-70"></div>
        <div class="absolute bottom-0 left-0 w-1/3 h-1/3 bg-purple-50 rounded-full filter blur-3xl opacity-70"></div>

        <div class="container mx-auto px-4 relative">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-blue-600 font-semibold text-sm tracking-wider uppercase">Global Reach</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4 gradient-text mt-2">Countries We Cover</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Get invitation letters for multiple countries across different continents
                </p>
            </div>

            <!-- Search and Filter -->
            <div class="max-w-xl mx-auto mb-12">
                <div class="relative" data-aos="fade-up">
                    <input type="text" 
                           id="countrySearch" 
                           placeholder="Search countries..." 
                           class="w-full px-6 py-4 rounded-full border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 pl-12">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            
            <!-- Countries Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
                <!-- USA -->
                <div class="country-card group" data-aos="zoom-in" data-aos-delay="100">
                    <div class="bg-white rounded-2xl p-6 text-center transform transition-all duration-300 
                                hover:-translate-y-2 hover:shadow-xl cursor-pointer relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 to-transparent opacity-0 
                                   group-hover:opacity-100 transition-opacity duration-300"></div>
                        <img src="assets/flags/usa.svg" alt="USA" 
                             class="w-16 h-16 mx-auto mb-4 rounded-full shadow-lg transform group-hover:scale-110 transition-transform duration-300">
                        <h3 class="text-xl font-bold text-gray-800">United States</h3>
                        <p class="text-gray-500 mt-2 text-sm">Visa & Tourist Letters</p>
                    </div>
                </div>

                <!-- UK -->
                <div class="country-card group" data-aos="zoom-in" data-aos-delay="200">
                    <div class="bg-white rounded-2xl p-6 text-center transform transition-all duration-300 
                                hover:-translate-y-2 hover:shadow-xl cursor-pointer relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 to-transparent opacity-0 
                                   group-hover:opacity-100 transition-opacity duration-300"></div>
                        <img src="assets/flags/uk.svg" alt="UK" 
                             class="w-16 h-16 mx-auto mb-4 rounded-full shadow-lg transform group-hover:scale-110 transition-transform duration-300">
                        <h3 class="text-xl font-bold text-gray-800">United Kingdom</h3>
                        <p class="text-gray-500 mt-2 text-sm">Business & Tourist Letters</p>
                    </div>
                </div>

                <!-- Canada -->
                <div class="country-card group" data-aos="zoom-in" data-aos-delay="300">
                    <div class="bg-white rounded-2xl p-6 text-center transform transition-all duration-300 
                                hover:-translate-y-2 hover:shadow-xl cursor-pointer relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 to-transparent opacity-0 
                                   group-hover:opacity-100 transition-opacity duration-300"></div>
                        <img src="assets/flags/canada.svg" alt="Canada" 
                             class="w-16 h-16 mx-auto mb-4 rounded-full shadow-lg transform group-hover:scale-110 transition-transform duration-300">
                        <h3 class="text-xl font-bold text-gray-800">Canada</h3>
                        <p class="text-gray-500 mt-2 text-sm">Study & Work Letters</p>
                    </div>
                </div>

                <!-- Add more countries with different gradients -->
                <!-- Australia -->
                <div class="country-card group" data-aos="zoom-in" data-aos-delay="400">
                    <div class="bg-white rounded-2xl p-6 text-center transform transition-all duration-300 
                                hover:-translate-y-2 hover:shadow-xl cursor-pointer relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-600/10 to-transparent opacity-0 
                                   group-hover:opacity-100 transition-opacity duration-300"></div>
                        <img src="assets/flags/australia.svg" alt="Australia" 
                             class="w-16 h-16 mx-auto mb-4 rounded-full shadow-lg transform group-hover:scale-110 transition-transform duration-300">
                        <h3 class="text-xl font-bold text-gray-800">Australia</h3>
                        <p class="text-gray-500 mt-2 text-sm">Tourist & Business Letters</p>
                    </div>
                </div>

                <!-- Add more country cards... -->
            </div>

            <!-- View All Countries Button -->
            <div class="text-center mt-12" data-aos="fade-up">
                <button id="viewAllCountries" 
                        class="inline-flex items-center px-8 py-4 text-lg font-bold text-white bg-gradient-to-r 
                               from-blue-600 to-blue-700 rounded-full hover:from-blue-700 hover:to-blue-800 
                               transform hover:scale-105 transition-all duration-300">
                    <span>View All Countries</span>
                    <i class="fas fa-chevron-down ml-3 transition-transform duration-300"></i>
                </button>
            </div>

            <!-- Country Details Modal -->
            <div id="countryModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
                <div class="min-h-screen flex items-center justify-center p-4">
                    <div class="bg-white rounded-2xl max-w-2xl w-full p-8 relative">
                        <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                        <div class="flex items-center mb-6">
                            <img src="" alt="" class="w-20 h-20 rounded-full shadow-lg mr-6">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800"></h3>
                                <p class="text-gray-600"></p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <!-- Modal content will be dynamically populated -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section id="application" class="py-20 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="container mx-auto px-4">
            <div class="text-center" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-white mb-6">Ready to Get Started?</h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Complete your application in just a few minutes and get your invitation letter instantly.
                </p>
                <a href="application.php" 
                   class="inline-flex items-center px-8 py-4 text-lg font-bold bg-white text-blue-600 
                          rounded-full hover:bg-blue-50 transform hover:scale-105 transition-all duration-300">
                    <span>Start Application</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- FAQs Section -->
    <section id="faqs" class="py-20 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-purple-50/50"></div>
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-100 rounded-full filter blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 left-0 w-1/3 h-1/3 bg-purple-100 rounded-full filter blur-3xl opacity-30"></div>

        <div class="container mx-auto px-4 relative">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-blue-600 font-semibold text-sm tracking-wider uppercase">Got Questions?</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4 gradient-text mt-2">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Find answers to common questions about our invitation letter service
                </p>
            </div>

            <!-- FAQ Categories -->
            <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up">
                <button class="faq-category-btn active px-6 py-3 rounded-full text-sm font-semibold transition-all duration-300
                               hover:shadow-lg bg-white hover:bg-blue-50">
                    All Questions
                </button>
                <button class="faq-category-btn px-6 py-3 rounded-full text-sm font-semibold transition-all duration-300
                               hover:shadow-lg bg-white hover:bg-blue-50">
                    Process
                </button>
                <button class="faq-category-btn px-6 py-3 rounded-full text-sm font-semibold transition-all duration-300
                               hover:shadow-lg bg-white hover:bg-blue-50">
                    Payment
                </button>
                <button class="faq-category-btn px-6 py-3 rounded-full text-sm font-semibold transition-all duration-300
                               hover:shadow-lg bg-white hover:bg-blue-50">
                    Documents
                </button>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <!-- FAQ Items -->
                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="100" data-category="process">
                        <button class="w-full px-8 py-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300
                                     flex justify-between items-center group">
                            <span class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                                How long does it take to get my invitation letter?
                            </span>
                            <span class="transform transition-transform duration-300 group-hover:rotate-180">
                                <i class="fas fa-chevron-down text-blue-600"></i>
                            </span>
                        </button>
                        <div class="faq-answer hidden">
                            <div class="px-8 py-6 bg-white rounded-b-2xl">
                                <p class="text-gray-600 leading-relaxed">
                                    Your invitation letter will be processed and delivered instantly after successful payment verification. 
                                    The entire process typically takes less than 5 minutes from submission to delivery.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200" data-category="payment">
                        <button class="w-full px-8 py-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300
                                     flex justify-between items-center group">
                            <span class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                                What payment methods do you accept?
                            </span>
                            <span class="transform transition-transform duration-300 group-hover:rotate-180">
                                <i class="fas fa-chevron-down text-blue-600"></i>
                            </span>
                        </button>
                        <div class="faq-answer hidden">
                            <div class="px-8 py-6 bg-white rounded-b-2xl">
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    We accept various payment methods including:
                                </p>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    <div class="flex items-center space-x-2">
                                        <i class="fab fa-cc-visa text-2xl text-blue-600"></i>
                                        <span>Visa</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fab fa-cc-mastercard text-2xl text-red-600"></i>
                                        <span>Mastercard</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fab fa-cc-amex text-2xl text-blue-800"></i>
                                        <span>American Express</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-credit-card text-2xl text-gray-600"></i>
                                        <span>Other Cards</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="300" data-category="documents">
                        <button class="w-full px-8 py-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300
                                     flex justify-between items-center group">
                            <span class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                                What documents do I need to provide?
                            </span>
                            <span class="transform transition-transform duration-300 group-hover:rotate-180">
                                <i class="fas fa-chevron-down text-blue-600"></i>
                            </span>
                        </button>
                        <div class="faq-answer hidden">
                            <div class="px-8 py-6 bg-white rounded-b-2xl">
                                <ul class="space-y-3 text-gray-600">
                                    <li class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                        Valid Passport Copy
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                        Proof of Address
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                        Travel Dates
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                        Purpose of Visit
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Add more FAQ items as needed -->
                </div>

                <!-- Still Have Questions -->
                <div class="mt-12 text-center p-8 bg-white rounded-2xl shadow-lg" data-aos="fade-up">
                    <h3 class="text-2xl font-bold mb-4">Still Have Questions?</h3>
                    <p class="text-gray-600 mb-6">Can't find the answer you're looking for? Please chat with our friendly team.</p>
                    <a href="#contact" class="inline-flex items-center px-8 py-4 text-lg font-bold text-white 
                                           bg-gradient-to-r from-blue-600 to-blue-700 rounded-full
                                           hover:from-blue-700 hover:to-blue-800 transform hover:scale-105 
                                           transition-all duration-300">
                        <i class="fas fa-comments mr-2"></i>
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });

        // FAQ Toggle
        document.querySelectorAll('.faq-item button').forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;
                const icon = button.querySelector('i').parentElement;
                const allAnswers = document.querySelectorAll('.faq-answer');
                const allIcons = document.querySelectorAll('.faq-item button i').forEach(i => 
                    i.parentElement.classList.remove('rotate-180'));

                // Close all other answers
                allAnswers.forEach(a => {
                    if (a !== answer) {
                        a.classList.add('hidden');
                    }
                });

                // Toggle current answer
                answer.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');

                // Smooth height transition
                if (!answer.classList.contains('hidden')) {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                } else {
                    answer.style.maxHeight = '0';
                }
            });
        });

        // Form Steps Animation
        const formSteps = document.querySelectorAll('.step');
        let currentStep = 0;

        function updateSteps() {
            formSteps.forEach((step, index) => {
                if (index <= currentStep) {
                    step.classList.add('active');
                } else {
                    step.classList.remove('active');
                }
            });
        }

        // Add smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add parallax effect
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            document.querySelectorAll('.parallax').forEach(element => {
                const speed = element.dataset.speed;
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Counter animation
        function animateCounter(element) {
            const target = parseFloat(element.dataset.count);
            const duration = 2000;
            const step = target / duration * 10;
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    element.textContent = target % 1 === 0 ? target : target.toFixed(1);
                    clearInterval(timer);
                } else {
                    element.textContent = current % 1 === 0 ? Math.floor(current) : current.toFixed(1);
                }
            }, 10);
        }

        // Start counter animation when element is in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('[data-count]');
                    counters.forEach(counter => animateCounter(counter));
                    observer.unobserve(entry.target);
                }
            });
        });

        document.querySelectorAll('.grid').forEach(grid => observer.observe(grid));

        // Country Search Functionality
        const countrySearch = document.getElementById('countrySearch');
        const countryCards = document.querySelectorAll('.country-card');

        countrySearch.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            
            countryCards.forEach(card => {
                const countryName = card.querySelector('h3').textContent.toLowerCase();
                if (countryName.includes(searchTerm)) {
                    card.style.display = 'block';
                    // Add fade in animation
                    card.style.opacity = '0';
                    setTimeout(() => card.style.opacity = '1', 50);
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // View All Countries Button
        const viewAllBtn = document.getElementById('viewAllCountries');
        let isExpanded = false;

        viewAllBtn.addEventListener('click', () => {
            isExpanded = !isExpanded;
            const icon = viewAllBtn.querySelector('i');
            icon.style.transform = isExpanded ? 'rotate(180deg)' : 'rotate(0)';
            
            // Add animation for showing/hiding additional countries
            // This would need to be implemented based on your full country list
        });

        // Country Modal Functionality
        const countryModal = document.getElementById('countryModal');
        
        countryCards.forEach(card => {
            card.addEventListener('click', () => {
                countryModal.classList.remove('hidden');
                // Populate modal content based on country data
                const countryName = card.querySelector('h3').textContent;
                const flagSrc = card.querySelector('img').src;
                
                const modalFlag = countryModal.querySelector('img');
                const modalTitle = countryModal.querySelector('h3');
                
                modalFlag.src = flagSrc;
                modalTitle.textContent = countryName;
                
                // Add fade in animation for modal
                countryModal.style.opacity = '0';
                setTimeout(() => countryModal.style.opacity = '1', 50);
            });
        });

        // Close Modal
        countryModal.querySelector('button').addEventListener('click', () => {
            countryModal.classList.add('hidden');
        });

        // Close Modal on Outside Click
        countryModal.addEventListener('click', (e) => {
            if (e.target === countryModal) {
                countryModal.classList.add('hidden');
            }
        });

        // FAQ Category Filter
        const categoryButtons = document.querySelectorAll('.faq-category-btn');
        const faqItems = document.querySelectorAll('.faq-item');

        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Update active button
                categoryButtons.forEach(btn => btn.classList.remove('active', 'bg-blue-600', 'text-white'));
                button.classList.add('active', 'bg-blue-600', 'text-white');

                // Filter FAQ items
                const category = button.textContent.trim().toLowerCase();
                faqItems.forEach(item => {
                    if (category === 'all questions' || item.dataset.category === category) {
                        item.style.display = 'block';
                        // Add fade in animation
                        item.style.opacity = '0';
                        setTimeout(() => item.style.opacity = '1', 50);
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html> 