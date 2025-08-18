<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>@yield('title', 'MPOELOT - Situs Game Online Terpercaya')</title>
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Aggressive floating WhatsApp removal -->
    <script>
        // Debug function to detect floating elements
        function debugFloatingElements() {
            console.log('🔍 DEBUGGING FLOATING ELEMENTS...');
            
            // Check all fixed positioned elements
            const allElements = document.querySelectorAll('*');
            const floatingElements = [];
            
            allElements.forEach(el => {
                const style = window.getComputedStyle(el);
                if (style.position === 'fixed') {
                    floatingElements.push({
                        element: el,
                        className: el.className,
                        id: el.id,
                        innerHTML: el.innerHTML.substring(0, 100),
                        style: {
                            position: style.position,
                            top: style.top,
                            right: style.right,
                            bottom: style.bottom,
                            left: style.left,
                            zIndex: style.zIndex
                        }
                    });
                }
            });
            
            console.log('🎯 Found fixed positioned elements:', floatingElements);
            
            // Check for WhatsApp related content
            const whatsappElements = document.querySelectorAll('*');
            const suspiciousElements = [];
            
            whatsappElements.forEach(el => {
                const text = el.textContent?.toLowerCase() || '';
                const html = el.innerHTML?.toLowerCase() || '';
                const className = el.className?.toLowerCase() || '';
                
                if (text.includes('whatsapp') || html.includes('whatsapp') || 
                    html.includes('wa.me') || className.includes('whatsapp') ||
                    html.includes('fa-whatsapp')) {
                    suspiciousElements.push({
                        element: el,
                        reason: 'Contains WhatsApp content',
                        className: el.className,
                        id: el.id,
                        innerHTML: el.innerHTML.substring(0, 200)
                    });
                }
            });
            
            console.log('⚠️ Found WhatsApp related elements:', suspiciousElements);
            
            // Check for iframes
            const iframes = document.querySelectorAll('iframe');
            console.log('📱 Found iframes:', iframes);
            
            // Check for external scripts
            const scripts = document.querySelectorAll('script[src]');
            const externalScripts = [];
            scripts.forEach(script => {
                if (script.src && (script.src.includes('http') || script.src.includes('//'))) {
                    externalScripts.push({
                        src: script.src,
                        async: script.async,
                        defer: script.defer
                    });
                }
            });
            console.log('📜 Found external scripts:', externalScripts);
            
            // Check for shadow DOM
            const shadowRoots = [];
            document.querySelectorAll('*').forEach(el => {
                if (el.shadowRoot) {
                    shadowRoots.push({
                        element: el,
                        shadowRoot: el.shadowRoot
                    });
                }
            });
            console.log('👥 Found shadow DOM elements:', shadowRoots);
            
            return { floatingElements, suspiciousElements, iframes, externalScripts, shadowRoots };
        }

        // Ultra aggressive floating WhatsApp removal
        function removeFloatingWhatsApp() {
            // First, debug what we found
            const debugInfo = debugFloatingElements();
            // Remove by class patterns
            const classPatterns = ['floating', 'fab', 'whatsapp', 'wa-float', 'chat-float', 'widget'];
            classPatterns.forEach(pattern => {
                document.querySelectorAll(`[class*="${pattern}"]`).forEach(el => {
                    if (el.innerHTML && (el.innerHTML.toLowerCase().includes('whatsapp') || 
                        el.innerHTML.includes('fa-whatsapp') || 
                        el.innerHTML.includes('wa.me'))) {
                        el.remove();
                    }
                });
            });
            
            // Remove by href patterns
            document.querySelectorAll('a[href*="wa.me"], a[href*="whatsapp"], a[href*="api.whatsapp"]').forEach(el => el.remove());
            
            // Remove by onclick patterns
            document.querySelectorAll('[onclick*="whatsapp"], [onclick*="wa.me"]').forEach(el => el.remove());
            
            // Remove fixed positioned elements with WhatsApp content
            document.querySelectorAll('div, a, button, span').forEach(el => {
                const style = window.getComputedStyle(el);
                if (style.position === 'fixed' && 
                    (style.bottom !== 'auto' || style.right !== 'auto') &&
                    (el.innerHTML && (el.innerHTML.toLowerCase().includes('whatsapp') || 
                     el.innerHTML.includes('fa-whatsapp') ||
                     el.innerHTML.includes('wa.me') ||
                     el.className.toLowerCase().includes('whatsapp')))) {
                    el.remove();
                }
            });
            
            // Remove by ID patterns
            const idPatterns = ['whatsapp', 'wa-widget', 'chat-widget', 'floating-wa'];
            idPatterns.forEach(pattern => {
                const el = document.getElementById(pattern);
                if (el) el.remove();
            });
            
            // Remove elements with WhatsApp icons
            document.querySelectorAll('i.fa-whatsapp, i.fab.fa-whatsapp').forEach(el => {
                let parent = el.parentElement;
                while (parent && parent !== document.body) {
                    const style = window.getComputedStyle(parent);
                    if (style.position === 'fixed') {
                        parent.remove();
                        break;
                    }
                    parent = parent.parentElement;
                }
            });
            
            // Check and remove elements that might be injected by hosting provider
            const hostingPatterns = [
                'cpanel', 'hostinger', 'namecheap', 'godaddy', 'bluehost', 
                'siteground', 'cloudflare', 'gtranslate', 'translate'
            ];
            
            hostingPatterns.forEach(pattern => {
                document.querySelectorAll(`[class*="${pattern}"], [id*="${pattern}"]`).forEach(el => {
                    const html = el.innerHTML?.toLowerCase() || '';
                    if (html.includes('whatsapp') || html.includes('wa.me') || html.includes('fa-whatsapp')) {
                        console.log('🏢 Removing hosting provider element:', el);
                        el.remove();
                    }
                });
            });
            
            // Remove any element that has green background and is positioned fixed (typical WhatsApp style)
            document.querySelectorAll('*').forEach(el => {
                const style = window.getComputedStyle(el);
                if (style.position === 'fixed' && 
                    (style.backgroundColor.includes('rgb(37, 211, 102)') || // WhatsApp green
                     style.backgroundColor.includes('#25d366') ||
                     style.backgroundColor.includes('green')) &&
                    (style.bottom !== 'auto' || style.right !== 'auto')) {
                    console.log('💚 Removing green fixed element (likely WhatsApp):', el);
                    el.remove();
                }
            });
        }
        
        // Run immediately
        removeFloatingWhatsApp();
        
        // Run after DOM is loaded
        document.addEventListener('DOMContentLoaded', removeFloatingWhatsApp);
        
        // Run after window loads (in case scripts inject later)
        window.addEventListener('load', function() {
            setTimeout(removeFloatingWhatsApp, 1000);
            setTimeout(removeFloatingWhatsApp, 3000);
            setTimeout(removeFloatingWhatsApp, 5000);
            
            // Show debug info on page after 6 seconds
            setTimeout(function() {
                const debugInfo = debugFloatingElements();
                if (debugInfo.floatingElements.length > 0 || debugInfo.suspiciousElements.length > 0) {
                    showDebugInfo(debugInfo);
                }
            }, 6000);
        });
        
        // Show debug information on page
        function showDebugInfo(debugInfo) {
            const debugDiv = document.createElement('div');
            debugDiv.id = 'floating-debug-info';
            debugDiv.style.cssText = `
                position: fixed;
                top: 10px;
                left: 10px;
                background: rgba(0, 0, 0, 0.9);
                color: #00ff00;
                padding: 20px;
                border-radius: 10px;
                font-family: monospace;
                font-size: 12px;
                z-index: 99999;
                max-width: 400px;
                max-height: 300px;
                overflow-y: auto;
                border: 2px solid #00ff00;
            `;
            
            let html = '<h3 style="color: #ff0000; margin: 0 0 10px 0;">🚨 FLOATING ELEMENTS DETECTED!</h3>';
            
            if (debugInfo.floatingElements.length > 0) {
                html += '<h4 style="color: #ffff00;">Fixed Positioned Elements:</h4>';
                debugInfo.floatingElements.forEach((item, index) => {
                    html += `<div style="margin: 5px 0; padding: 5px; border: 1px solid #333;">
                        <strong>#${index + 1}</strong><br>
                        Class: ${item.className || 'none'}<br>
                        ID: ${item.id || 'none'}<br>
                        Position: ${item.style.bottom}, ${item.style.right}<br>
                        HTML: ${item.innerHTML.substring(0, 50)}...
                    </div>`;
                });
            }
            
            if (debugInfo.suspiciousElements.length > 0) {
                html += '<h4 style="color: #ff8800;">WhatsApp Elements:</h4>';
                debugInfo.suspiciousElements.forEach((item, index) => {
                    html += `<div style="margin: 5px 0; padding: 5px; border: 1px solid #333;">
                        <strong>#${index + 1}</strong><br>
                        Class: ${item.className || 'none'}<br>
                        ID: ${item.id || 'none'}<br>
                        Reason: ${item.reason}<br>
                        HTML: ${item.innerHTML.substring(0, 50)}...
                    </div>`;
                });
            }
            
            html += '<button onclick="this.parentElement.remove()" style="margin-top: 10px; padding: 5px 10px; background: #ff0000; color: white; border: none; border-radius: 3px; cursor: pointer;">Close Debug</button>';
            
            debugDiv.innerHTML = html;
            document.body.appendChild(debugDiv);
        }
        
        // Monitor for dynamically added elements
        if (window.MutationObserver) {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'childList') {
                        mutation.addedNodes.forEach(function(node) {
                            if (node.nodeType === 1) { // Element node
                                const el = node;
                                if (el.innerHTML && (el.innerHTML.toLowerCase().includes('whatsapp') || 
                                    el.innerHTML.includes('fa-whatsapp') || 
                                    el.innerHTML.includes('wa.me'))) {
                                    setTimeout(() => el.remove(), 100);
                                }
                            }
                        });
                    }
                });
            });
            observer.observe(document.body, { childList: true, subtree: true });
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* Block all floating WhatsApp elements */
        [class*="whatsapp"],
        [class*="wa-float"],
        [class*="floating"][href*="wa.me"],
        [class*="floating"][onclick*="whatsapp"],
        a[href*="wa.me"],
        a[href*="whatsapp"],
        a[href*="api.whatsapp"],
        #whatsapp,
        #wa-widget,
        #chat-widget,
        #floating-wa,
        .fab.fa-whatsapp,
        i.fa-whatsapp {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }
        
        /* Block fixed positioned elements that might be floating WhatsApp */
        div[style*="position: fixed"][style*="bottom"][style*="right"]:has(i.fa-whatsapp),
        a[style*="position: fixed"][style*="bottom"][style*="right"]:has(i.fa-whatsapp) {
            display: none !important;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Cyberpunk Theme */
        :root {
            --neon-cyan: #00FFFF;
            --neon-pink: #FF0080;
            --neon-purple: #8B00FF;
            --electric-blue: #0080FF;
            --cyber-red: #FF0040;
            --cyber-magenta: #FF00B4;
            --cyber-navy: #0A0F2C;
            --cyber-dark: #1A0B1A;
            --cyber-black: #0D0D0D;
            --cyber-violet: #2D1B69;
        }
        
        .gradient-cyber {
            background: linear-gradient(135deg, var(--neon-cyan) 0%, var(--neon-pink) 50%, var(--neon-purple) 100%);
        }
        
        .gradient-cyber-dark {
            background: linear-gradient(135deg, var(--cyber-navy) 0%, var(--cyber-dark) 50%, var(--cyber-violet) 100%);
        }
        
        .text-gradient-gold {
            background: linear-gradient(135deg, var(--accent-gold) 0%, var(--accent-yellow) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Sidebar Styles */
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        
        .sidebar.open {
            transform: translateX(0);
        }
        
        /* Cyber Hamburger Menu */
        .cyber-hamburger {
            position: relative;
            width: 30px;
            height: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .cyber-hamburger span {
            display: block;
            position: absolute;
            height: 3px;
            width: 100%;
            background: linear-gradient(90deg, var(--neon-cyan), var(--neon-purple));
            border-radius: 9px;
            opacity: 1;
            left: 0;
            transform: rotate(0deg);
            transition: all 0.25s ease-in-out;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }
        
        .cyber-hamburger span:nth-child(1) {
            top: 0px;
        }
        
        .cyber-hamburger span:nth-child(2),
        .cyber-hamburger span:nth-child(3) {
            top: 11px;
        }
        
        .cyber-hamburger span:nth-child(4) {
            top: 22px;
        }
        
        .cyber-hamburger.active span:nth-child(1) {
            top: 11px;
            width: 0%;
            left: 50%;
            opacity: 0;
        }
        
        .cyber-hamburger.active span:nth-child(2) {
            transform: rotate(45deg);
            background: linear-gradient(90deg, var(--neon-pink), var(--cyber-red));
            box-shadow: 0 0 15px rgba(255, 0, 128, 0.8);
        }
        
        .cyber-hamburger.active span:nth-child(3) {
            transform: rotate(-45deg);
            background: linear-gradient(90deg, var(--neon-pink), var(--cyber-red));
            box-shadow: 0 0 15px rgba(255, 0, 128, 0.8);
        }
        
        .cyber-hamburger.active span:nth-child(4) {
            top: 11px;
            width: 0%;
            left: 50%;
            opacity: 0;
        }
        
        .cyber-hamburger:hover span {
            background: linear-gradient(90deg, var(--neon-pink), var(--neon-purple));
            box-shadow: 0 0 20px rgba(255, 0, 128, 0.8);
            animation: cyberPulse 1.5s infinite;
        }
        
        @keyframes cyberPulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }
        
        /* Cyber Button Container */
        .cyber-button-container {
            position: relative;
            padding: 8px;
            border-radius: 8px;
            background: rgba(0, 255, 255, 0.1);
            border: 1px solid rgba(0, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .cyber-button-container:hover {
            background: rgba(255, 0, 128, 0.1);
            border-color: rgba(255, 0, 128, 0.3);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
        }
        
        .cyber-button-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--neon-cyan), var(--neon-purple), var(--neon-pink), var(--neon-cyan));
            border-radius: 10px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
            animation: borderGlow 3s linear infinite;
        }
        
        .cyber-button-container:hover::before {
            opacity: 0.7;
        }
        
        @keyframes borderGlow {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        
        /* Cyber Auth Buttons */
        .cyber-auth-btn {
            position: relative;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            backdrop-filter: blur(10px);
        }
        
        .cyber-auth-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .cyber-auth-btn:hover::before {
            left: 100%;
        }
        
        .cyber-auth-btn::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 22px;
            padding: 2px;
            background: linear-gradient(45deg, var(--neon-cyan), var(--neon-pink), var(--neon-purple), var(--neon-cyan));
            background-size: 300% 300%;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
            animation: gradientShift 3s ease infinite;
        }
        
        .cyber-auth-btn:hover::after {
            opacity: 1;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .cyber-auth-btn:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
        
        .cyber-auth-btn:active {
            transform: translateY(0) scale(0.98);
        }
        
        /* Button specific styles */
        .btn-register {
            background: linear-gradient(135deg, rgba(255, 0, 128, 0.8), rgba(255, 0, 64, 0.8));
            color: white;
            border-color: rgba(255, 0, 128, 0.3);
        }
        
        .btn-register:hover {
            background: linear-gradient(135deg, rgba(255, 0, 128, 1), rgba(255, 0, 64, 1));
            border-color: rgba(255, 0, 128, 0.6);
            box-shadow: 0 8px 25px rgba(255, 0, 128, 0.4);
        }
        
        .btn-login {
            background: linear-gradient(135deg, rgba(0, 255, 255, 0.8), rgba(139, 0, 255, 0.8));
            color: white;
            border-color: rgba(0, 255, 255, 0.3);
        }
        
        .btn-login:hover {
            background: linear-gradient(135deg, rgba(0, 255, 255, 1), rgba(139, 0, 255, 1));
            border-color: rgba(0, 255, 255, 0.6);
            box-shadow: 0 8px 25px rgba(0, 255, 255, 0.4);
        }
        

        

        

        
        /* Game Card Hover Effect */
        .game-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .game-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        

        
        /* Scrollbar Custom */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--neon-cyan);
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--neon-purple);
        }
        
        /* Glass Effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Logo Bounce Animation */
        @keyframes logoBounceCool {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0) scale(1);
            }
            40% {
                transform: translateY(-12px) scale(1.05);
            }
            60% {
                transform: translateY(-6px) scale(1.02);
            }
        }
        
        @keyframes logoGlow {
            0%, 100% {
                filter: drop-shadow(0 0 5px rgba(0, 255, 255, 0.5));
            }
            33% {
                filter: drop-shadow(0 0 15px rgba(255, 0, 128, 0.8));
            }
            66% {
                filter: drop-shadow(0 0 12px rgba(255, 0, 64, 0.7));
            }
        }
        
        .logo-bounce {
            animation: logoBounceCool 3s ease-in-out infinite, logoGlow 2s ease-in-out infinite alternate;
            transition: all 0.3s ease;
        }
        
        .logo-bounce:hover {
            animation-duration: 1s, 1s;
            transform: scale(1.1);
        }
        
        /* Lightning Animation */
        @keyframes lightning {
            0% {
                transform: translateX(-100%) skewX(-15deg);
                opacity: 0;
            }
            20% {
                opacity: 1;
            }
            80% {
                opacity: 1;
            }
            100% {
                transform: translateX(400%) skewX(-15deg);
                opacity: 0;
            }
        }
        
        .lightning-effect {
            overflow: hidden;
        }
        
        .lightning-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(0, 255, 255, 0.15) 15%, 
                rgba(255, 0, 128, 0.25) 35%, 
                rgba(255, 0, 64, 0.3) 50%, 
                rgba(255, 0, 180, 0.25) 65%, 
                rgba(0, 255, 255, 0.15) 85%, 
                transparent 100%);
            animation: lightning 3s ease-in-out infinite;
            z-index: 1;
            pointer-events: none;
        }
        
    </style>
</head>
<body class="min-h-screen" data-authenticated="{{ auth()->check() ? 'true' : 'false' }}" style="background: linear-gradient(135deg, #0A0F2C 0%, #1A0B1A 25%, #0D0D0D 50%, #2D1B69 75%, #1A0B1A 100%);">
    <!-- Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
    
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar fixed top-0 left-0 w-72 h-full gradient-cyber-dark z-50 p-6 overflow-y-auto">
        @include('components.sidebar')
    </div>
    
    <!-- Main Content -->
    <div class="relative min-h-screen">
        <!-- Header -->
        <header class="gradient-cyber-dark shadow-lg sticky top-0 z-30">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between h-16">
                    <!-- Sidebar Toggle & Logo -->
                    <div class="flex items-center space-x-4">
                        <div class="cyber-button-container lg:hidden">
                            <div id="sidebar-toggle" class="cyber-hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="cyber-button-container hidden lg:block">
                            <div id="sidebar-toggle-desktop" class="cyber-hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        
                        <!-- Logo -->
                        <div class="flex items-center space-x-2">
                            @php
                                $logoPath = \App\Models\Setting::get('logo', 'images/logo.png');
                                $logoUrl = str_starts_with($logoPath, 'images/') ? asset($logoPath) : asset('storage/' . $logoPath);
                            @endphp
                            <img src="{{ $logoUrl }}" alt="{{ \App\Models\Setting::get('site_name', 'MPOELOT') }}" class="h-10 w-auto logo-bounce cursor-pointer">
                        </div>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">
                        @auth
                            <div class="flex items-center space-x-3">
                                <div class="text-white text-right hidden sm:block">
                                    <div class="text-sm">{{ auth()->user()->full_name ?? auth()->user()->username }}</div>
                                    <div class="text-xs text-cyan-400">Saldo: Rp {{ number_format(optional(auth()->user())->balance ?? 0, 0, ',', '.') }}</div>
                                </div>
                                <div class="w-10 h-10 bg-gradient-to-r from-cyan-400 to-pink-500 rounded-full flex items-center justify-center" style="box-shadow: 0 0 15px rgba(0, 255, 255, 0.4);">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center space-x-2">
                                <button onclick="openRegisterModal()" class="cyber-auth-btn btn-register">
                                    <span class="relative z-10">Daftar</span>
                                </button>
                                <button onclick="openLoginModal()" class="cyber-auth-btn btn-login">
                                    <span class="relative z-10">Masuk</span>
                                </button>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </header>
        

        
        <!-- Page Content -->
        <main class="pb-20">
            @yield('content')
        </main>
        
        <!-- Bottom Navigation -->
        <nav class="fixed bottom-0 left-0 right-0 backdrop-blur-xl border-t border-cyan-500/30 z-50 lightning-effect" style="position: fixed !important; bottom: 0 !important; background: linear-gradient(135deg, rgba(26, 11, 26, 0.8) 0%, rgba(13, 13, 13, 0.9) 50%, rgba(45, 27, 105, 0.8) 100%);">
            <div class="flex items-center justify-around h-16 px-4 relative z-10">
                <a href="{{ auth()->check() ? route('dashboard') : route('home') }}" class="nav-item {{ (request()->routeIs('home') || request()->routeIs('dashboard')) ? 'active' : '' }}">
                    <div class="relative flex flex-col items-center group">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center transform transition-all duration-500 ease-out group-hover:scale-110">
                            <i class="fas fa-home text-2xl {{ (request()->routeIs('home') || request()->routeIs('dashboard')) ? 'text-cyan-400' : 'text-gray-400' }} group-hover:text-cyan-400 transition-colors duration-300" style="filter: drop-shadow(0 0 8px currentColor);"></i>
                        </div>
                        @if(request()->routeIs('home') || request()->routeIs('dashboard'))
                        <span class="nav-label mt-1 text-xs font-semibold text-cyan-400">Home</span>
                        @else
                        <span class="nav-label mt-1 text-xs font-medium text-gray-400 opacity-0 group-hover:opacity-100 group-hover:text-cyan-400 transition-all duration-300">Home</span>
                        @endif
                    </div>
                </a>
                
                <a href="{{ route('promo') }}" class="nav-item {{ request()->routeIs('promo') ? 'active' : '' }}">
                    <div class="relative flex flex-col items-center group">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center transform transition-all duration-500 ease-out group-hover:scale-110">
                            <i class="fas fa-fire-flame-curved text-2xl {{ request()->routeIs('promo') ? 'text-orange-400' : 'text-gray-400' }} group-hover:text-orange-400 transition-colors duration-300" style="filter: drop-shadow(0 0 8px currentColor);"></i>
                        </div>
                        @if(request()->routeIs('promo'))
                        <span class="nav-label mt-1 text-xs font-semibold text-orange-400">Promo</span>
                        @else
                        <span class="nav-label mt-1 text-xs font-medium text-gray-400 opacity-0 group-hover:opacity-100 group-hover:text-orange-400 transition-all duration-300">Promo</span>
                        @endif
                    </div>
                </a>
                
                <a href="{{ route('live-chat') }}" class="nav-item {{ request()->routeIs('live-chat') ? 'active' : '' }}">
                    <div class="relative flex flex-col items-center group">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center transform transition-all duration-500 ease-out group-hover:scale-110">
                            <i class="fas fa-headset text-2xl {{ request()->routeIs('live-chat') ? 'text-purple-400' : 'text-gray-400' }} group-hover:text-purple-400 transition-colors duration-300" style="filter: drop-shadow(0 0 8px currentColor);"></i>
                        </div>
                        @if(request()->routeIs('live-chat'))
                        <span class="nav-label mt-1 text-xs font-semibold text-purple-400">Live Chat</span>
                        @else
                        <span class="nav-label mt-1 text-xs font-medium text-gray-400 opacity-0 group-hover:opacity-100 group-hover:text-purple-400 transition-all duration-300">Live Chat</span>
                        @endif
                    </div>
                </a>
            </div>
        </nav>
        
    </div>
    
    <!-- Login Modal -->
    @include('components.login-modal')
    
    <!-- JavaScript -->
    <script>
        
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarToggleDesktop = document.getElementById('sidebar-toggle-desktop');
        
        function toggleSidebar() {
            sidebar.classList.toggle('open');
            sidebarOverlay.classList.toggle('hidden');
            
            // Toggle hamburger animation
            sidebarToggle?.classList.toggle('active');
            sidebarToggleDesktop?.classList.toggle('active');
        }
        
        function closeSidebar() {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.add('hidden');
            
            // Reset hamburger animation
            sidebarToggle?.classList.remove('active');
            sidebarToggleDesktop?.classList.remove('active');
        }
        
        sidebarToggle?.addEventListener('click', toggleSidebar);
        sidebarToggleDesktop?.addEventListener('click', toggleSidebar);
        sidebarOverlay?.addEventListener('click', closeSidebar);
        
        // Close sidebar when clicking links on mobile
        document.querySelectorAll('#sidebar a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1024) {
                    closeSidebar();
                }
            });
        });
        
        // Login Modal Functions
        function openLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
            document.getElementById('loginModal').classList.add('flex');
        }
        
        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.getElementById('loginModal').classList.remove('flex');
        }
        
        function openRegisterModal() {
            openLoginModal();
            // Switch to register tab after modal opens
            setTimeout(() => {
                const registerTab = document.getElementById('registerTab');
                if (registerTab) {
                    registerTab.click();
                }
            }, 100);
        }
        

        
        // Game card animations
        document.addEventListener('DOMContentLoaded', function() {
            const gameCards = document.querySelectorAll('.game-card');
            gameCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('animate-fade-in-up');
            });
        });
        
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Logo click animation
        const logo = document.querySelector('.logo-bounce');
        if (logo) {
            logo.addEventListener('click', function() {
                // Add extra bounce effect on click
                this.style.animation = 'none';
                setTimeout(() => {
                    this.style.animation = 'logoBounceCool 0.6s ease-in-out, logoGlow 0.6s ease-in-out';
                    setTimeout(() => {
                        this.style.animation = 'logoBounceCool 3s ease-in-out infinite, logoGlow 2s ease-in-out infinite alternate';
                    }, 600);
                }, 10);
            });
        }
    </script>
    
    @stack('scripts')
</body>
</html>
