<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}.pdf</title>


    {{-- custom css --}}
    <style>
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .rotate {
            transform: rotate(90deg);
            text-align: center;
            font-size: 8px;
            border: 2px solid transparent;
        }

        @font-face {
            font-family: "Busorama";
            src: url('{{ public_path(' fonts/busorama.ttf') }}');
            font-weight: normal;
            font-style: normal;
            font-stretch: normal;
        }

        .busorama {
            font-family: 'Busorama';
        }

        .uppercase {
            text-transform: uppercase;
        }

        .bold {
            font-weight: bold;
        }

        .p-5 {
            padding: 5%;
        }

        .pb-5 {
            padding-bottom: 5%;
        }

        .pb-3 {
            padding-bottom: 3%;
        }

        .p-10 {
            padding: 10%;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .w-100 {
            width: 100%;
        }

        .m-10 {
            margin: 10%
        }

        .mt-10 {
            margin-top: 10%
        }

        .mb-10 {
            margin-bottom: 10%
        }

        .mb-3 {
            margin-bottom: 3%
        }

        .mb-5 {
            margin-bottom: 5%
        }

        .text-blue {
            color: #1F4E79;
        }

        .text-red {
            color: red;
        }

        .bg-blue {
            background: #1F4E79;
            color: #fff;
        }

        .bg-cyan {
            background: #DEEBF7;
        }

        .bg-orange {
            background: #F4B183;
        }

        .bg-yellow {
            background: #fde047;
        }

        .bg-red {
            background: #fda4af;
            color: #000;
        }

        .bg-green {
            background: #E2F0D9;
        }

        .italic {
            font-style: italic;
        }

        .pl-5 {
            padding-left: 5%;
        }

        .pl-10 {
            padding-left: 20%;
        }

        .pl-15 {
            padding-left: 30%;
        }

        /* td {
            padding: 0 10px 0 3px;
            border: 2px solid #fff;
        } */
    </style>

    {{-- reset attributes --}}
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        ::after,
        ::before {
            --tw-content: ''
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal
        }

        body {
            margin: 0;
            line-height: inherit
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b,
        strong {
            font-weight: bolder
        }

        code,
        kbd,
        pre,
        samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1em
        }

        small {
            font-size: 80%
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            font-weight: inherit;
            line-height: inherit;
            color: inherit;
            margin: 0;
            padding: 0
        }

        button,
        select {
            text-transform: none
        }

        [type=button],
        [type=reset],
        [type=submit],
        button {
            -webkit-appearance: button;
            background-color: transparent;
            background-image: none
        }

        :-moz-focusring {
            outline: auto
        }

        :-moz-ui-invalid {
            box-shadow: none
        }

        progress {
            vertical-align: baseline
        }

        ::-webkit-inner-spin-button,
        ::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        blockquote,
        dd,
        dl,
        figure,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        p,
        pre {
            margin: 0
        }

        fieldset {
            margin: 0;
            padding: 0
        }

        legend {
            padding: 0
        }

        menu,
        ol,
        ul {
            list-style: none;
            margin: 0;
            padding: 0
        }

        textarea {
            resize: vertical
        }

        input::placeholder,
        textarea::placeholder {
            opacity: 1;
            color: #9ca3af
        }

        [role=button],
        button {
            cursor: pointer
        }

        :disabled {
            cursor: default
        }

        audio,
        canvas,
        embed,
        iframe,
        img,
        object,
        svg,
        video {
            display: block;
            vertical-align: middle
        }

        img,
        video {
            max-width: 100%;
            height: auto
        }

        [hidden] {
            display: none
        }

        *,
        ::before,
        ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::-webkit-backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        .relative {
            position: relative
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .mx-6 {
            margin-left: 1.5rem;
            margin-right: 1.5rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-16 {
            margin-top: 4rem
        }

        .mt-6 {
            margin-top: 1.5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .mr-1 {
            margin-right: 0.25rem
        }

        .flex {
            display: flex
        }

        .inline-flex {
            display: inline-flex
        }

        .grid {
            display: grid
        }

        .h-16 {
            height: 4rem
        }

        .h-7 {
            height: 1.75rem
        }

        .h-6 {
            height: 1.5rem
        }

        .h-5 {
            height: 1.25rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .w-auto {
            width: auto
        }

        .w-16 {
            width: 4rem
        }

        .w-7 {
            width: 1.75rem
        }

        .w-6 {
            width: 1.5rem
        }

        .w-5 {
            width: 1.25rem
        }

        .max-w-7xl {
            max-width: 80rem
        }

        .shrink-0 {
            flex-shrink: 0
        }

        .scale-100 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .gap-6 {
            gap: 1.5rem
        }

        .gap-4 {
            gap: 1rem
        }

        .self-center {
            align-self: center
        }

        .rounded-lg {
            border-radius: 0.5rem
        }

        .rounded-full {
            border-radius: 9999px
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-red-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(254 242 242 / var(--tw-bg-opacity))
        }

        .bg-dots-darker {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")
        }

        .from-gray-700\/50 {
            --tw-gradient-from: rgb(55 65 81 / 0.5);
            --tw-gradient-to: rgb(55 65 81 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
        }

        .via-transparent {
            --tw-gradient-to: rgb(0 0 0 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), transparent, var(--tw-gradient-to)
        }

        .bg-center {
            background-position: center
        }

        .stroke-red-500 {
            stroke: #ef4444
        }

        .stroke-gray-400 {
            stroke: #9ca3af
        }

        .p-6 {
            padding: 1.5rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .text-center {
            text-align: center
        }

        .text-right {
            text-align: right
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem
        }

        .font-semibold {
            font-weight: 600
        }

        .leading-relaxed {
            line-height: 1.625
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .underline {
            -webkit-text-decoration-line: underline;
            text-decoration-line: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .shadow-2xl {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .shadow-gray-500\/20 {
            --tw-shadow-color: rgb(107 114 128 / 0.2);
            --tw-shadow: var(--tw-shadow-colored)
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms
        }

        .selection\:bg-red-500 *::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white *::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .selection\:bg-red-500::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .hover\:text-gray-900:hover {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .hover\:text-gray-700:hover {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .focus\:rounded-sm:focus {
            border-radius: 0.125rem
        }

        .focus\:outline:focus {
            outline-style: solid
        }

        .focus\:outline-2:focus {
            outline-width: 2px
        }

        .focus\:outline-red-500:focus {
            outline-color: #ef4444
        }

        .group:hover .group-hover\:stroke-gray-600 {
            stroke: #4b5563
        }

        @media (prefers-reduced-motion: no-preference) {
            .motion-safe\:hover\:scale-\[1\.01\]:hover {
                --tw-scale-x: 1.01;
                --tw-scale-y: 1.01;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-800\/50 {
                background-color: rgb(31 41 55 / 0.5)
            }

            .dark\:bg-red-800\/20 {
                background-color: rgb(153 27 27 / 0.2)
            }

            .dark\:bg-dots-lighter {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")
            }

            .dark\:bg-gradient-to-bl {
                background-image: linear-gradient(to bottom left, var(--tw-gradient-stops))
            }

            .dark\:stroke-gray-600 {
                stroke: #4b5563
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:shadow-none {
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .dark\:ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .dark\:ring-inset {
                --tw-ring-inset: inset
            }

            .dark\:ring-white\/5 {
                --tw-ring-color: rgb(255 255 255 / 0.05)
            }

            .dark\:hover\:text-white:hover {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .group:hover .dark\:group-hover\:stroke-gray-400 {
                stroke: #9ca3af
            }
        }

        @media (min-width: 640px) {
            .sm\:fixed {
                position: fixed
            }

            .sm\:top-0 {
                top: 0px
            }

            .sm\:right-0 {
                right: 0px
            }

            .sm\:ml-0 {
                margin-left: 0px
            }

            .sm\:flex {
                display: flex
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-center {
                justify-content: center
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:gap-8 {
                gap: 2rem
            }

            .lg\:p-8 {
                padding: 2rem
            }
        }
    </style>



</head>

<body>


    <header>
        <center>
            <img src="{{ public_path('images/assets/branding.png') }}" width="50">
            <h1 class="text-blue busorama" style="font-size:16px;">Career Executive Service Board</h1>

            <div style="font-size:9px;">
                <p>
                    No. 3 Marcelino St., Isidora Hills, Holy Spirit Drive, Diliman, Quezon City 1127
                </p>
                <p>
                    Tel No. 8951-4981 to 88 * Fax No. 8931-5732 *
                    <a href="https://www.cesboard.gov.ph/" target="_blank">www.cesboard.gov.ph</a>
                </p>
            </div>
        </center>
    </header>
    <br />
    <div class="text-center mb-3">
        <h1 class="bold" style="font-size:9px">
            CES OCCUPANCY STATISTICS
        </h1>
        <p class="italic" style="font-size: 9px">
            as of {{ $currentDate }}
        </p>
    </div>


    <table width="100%" style="font-size: 9px;">
    <thead>
        <tr>
            <td style="text-decoration: underline;" class="bold">
                Executive Branch
            </td>
        </tr>
        
        <tr>
            <td class="bold italic">
                National Government Agencies
            </td>
        </tr>
    </thead>
        @php
            $no = 1;
            $grandTotalPosition = 0;
            $grandVacantCESPosition = 0;
            $grandCesosAndEligibles = 0;
            $grandCeso = 0;
            $grandEligibles = 0;
            $grandCsee = 0;
            $grandNonCesosAndNonEligibles = 0;
            $grandNonCesEligible = 0;
            $grandMaleCeso = 0;
            $grandMaleEligibles = 0;
            $grandMaleCesoAndEligibles = 0;
            $grandMaleCSEE = 0;
            $grandMaleNonCesEligibles = 0;
            $grandMaleNonCesNonEligibles = 0;
            $grandCountByMale = 0;
            $grandCountByFemale = 0;
            $grandOccupiedFemaleNonCesNonEligibles = 0;
            $grandFemaleNonCesNonEligibles = 0;
            $grandFemaleCSEE = 0;
            $grandFemaleCesoAndEligibles = 0;
            $grandFemaleCeso = 0;
            $grandFemaleEligibles = 0;
            
        @endphp
        @foreach ($motherDepartmentAgency as $motherDepartmentAgencyDatas)

        @php
            $selectedDeptid = $motherDepartmentAgencyDatas->deptid;
            $totalPosition = \App\Models\Plantilla\PlanPosition::whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
                ->where('is_ces_pos', 1)
                ->where('pres_apptee', 1)
                ->where('is_active', 1)
                ->count();

            $occupiedCESPosition = \App\Models\Plantilla\PlanPosition::query()
                ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
                ->where('is_ces_pos', 1)
                ->where('pres_apptee', 1)
                ->where('is_active', 1)
                ->whereHas('planAppointee', function ($query) {
                    $query->where('is_appointee', 1);
                })
                ->count();
            $vacantCESPosition = $totalPosition - $occupiedCESPosition;
            $occupiedCESPositionPercentage = round(($occupiedCESPosition / $totalPosition) * 100);
            $vacantCESPositionPercentage = (100 - $occupiedCESPositionPercentage);


            

            $cesosAndEligibles = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData.cesStatus', function ($query) {
                        $query->where('description', 'LIKE', '%Eli%')
                            ->orWhere('description', 'LIKE', '%CES%');
                    });
            })
            ->count();

            $ceso = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData.cesStatus', function ($query) {
                        $query->where('description', 'LIKE', '%CES%');
                    });
            })
            ->count();

            $eligibles = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData.cesStatus', function ($query) {
                        $query->where('description', 'LIKE', '%Eli%');
                    });
            })
            ->count();
            $nonCesosAndNonEligibles = $occupiedCESPosition - $cesosAndEligibles;

            $csee = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData.cesStatus', function ($query) {
                        $query->where('description', 'LIKE', '%CSE%');
                    });
            })
            ->count();
            $nonCesEligible = ($nonCesosAndNonEligibles-$csee);


            $occupiedCESPercentage = round(($cesosAndEligibles / $occupiedCESPosition) *100);
            $occupiedNonCESPercentage = (100 - $occupiedCESPercentage);

            $maleCesoAndEligibles = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData', function ($query) {
                        $query->where('gender', 'Male')
                            ->whereHas('cesStatus', function ($query) {
                                $query->where('description', 'LIKE', '%CES%')
                                    ->orWhere('description', 'LIKE', '%Eli%');
                            });
                    });
            })
            ->count();

        $maleCeso = \App\Models\Plantilla\PlanPosition::query()
        ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData', function ($query) {
                        $query->where('gender', 'Male')
                            ->whereHas('cesStatus', function ($query) {
                                $query->where('description', 'LIKE', '%CES%');
                            });
                    });
            })
            ->count();
        $maleEligibles = \App\Models\Plantilla\PlanPosition::query()
        ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData', function ($query) {
                        $query->where('gender', 'Male')
                            ->whereHas('cesStatus', function ($query) {
                                $query->where('description', 'LIKE', '%Eli%');
                            });
                    });
            })
            ->count();

        $maleCSEE = \App\Models\Plantilla\PlanPosition::query()
        ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData', function ($query) {
                        $query->where('gender', 'Male')
                            ->whereHas('cesStatus', function ($query) {
                                $query->where('description', 'LIKE', '%CSE%');
                            });
                    });
            })
            ->count();

            $countByMale = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData', function ($query) {
                        $query->where('gender', 'Male');
                    });
            })
            ->count();
            $maleNonCesNonEligibles = ($countByMale - $maleCesoAndEligibles);
            $maleNonCesEligibles = ($maleNonCesNonEligibles - $maleCSEE);

            $countByFemale = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData', function ($query) {
                        $query->where('gender', 'Female');
                    });
            })
            ->count();

        $femaleCeso = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })    
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData', function ($query) {
                        $query->where('gender', 'Female')
                            ->whereHas('cesStatus', function ($query) {
                                $query->where('description', 'LIKE', '%CES%');
                            });
                    });
            })
            ->count();
        $femaleEligibles = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })    
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData', function ($query) {
                        $query->where('gender', 'Female')
                            ->whereHas('cesStatus', function ($query) {
                                $query->where('description', 'LIKE', '%Eli%');
                            });
                    });
            })
            ->count();
        $femaleCSEE = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })    
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData', function ($query) {
                        $query->where('gender', 'Female')
                            ->whereHas('cesStatus', function ($query) {
                                $query->where('description', 'LIKE', '%CSE%');
                            });
                    });
            })
            ->count();

            $femaleCesoAndEligibles = \App\Models\Plantilla\PlanPosition::query()
            ->whereHas('office.agencyLocation.departmentAgency', function ($query) use ($selectedDeptid) {
                    $query->where('deptid', $selectedDeptid)
                        ->orWhere('mother_deptid', $selectedDeptid);
                })
            ->where('is_ces_pos', 1)
            ->where('pres_apptee', 1)
            ->where('is_active', 1)
            ->whereHas('planAppointee', function ($query) {
                $query->where('is_appointee', 1)
                    ->whereHas('personalData', function ($query) {
                        $query->where('gender', 'Female')
                            ->whereHas('cesStatus', function ($query) {
                                $query->where('description', 'LIKE', '%CES%')
                                    ->orWhere('description', 'LIKE', '%Eli%');
                            });
                    });
            })
            ->count();
            $occupiedFemaleNonCesNonEligibles = ($countByFemale - $femaleCesoAndEligibles);
            $femaleNonCesNonEligibles = ($occupiedFemaleNonCesNonEligibles - $femaleCSEE);
            

            // grandTotal
            $grandTotalPosition += $totalPosition;
            $grandVacantCESPosition += $vacantCESPosition;
            $grandCesosAndEligibles += $cesosAndEligibles;
            $grandCeso += $ceso;
            $grandEligibles += $eligibles;
            $grandCsee += $csee;
            $grandNonCesEligible += $nonCesEligible;
            $grandNonCesosAndNonEligibles += $nonCesosAndNonEligibles;
            $grandMaleCeso += $maleCeso;
            $grandMaleEligibles += $maleEligibles;
            $grandMaleCesoAndEligibles += $maleCesoAndEligibles;
            $grandMaleCSEE += $maleCSEE;
            $grandMaleNonCesEligibles += $maleNonCesEligibles;
            $grandCountByMale += $countByMale;
            $grandCountByFemale += $countByFemale;
            $grandOccupiedFemaleNonCesNonEligibles += $occupiedFemaleNonCesNonEligibles;
            $grandFemaleNonCesNonEligibles += $femaleNonCesNonEligibles;
            $grandFemaleCSEE += $femaleCSEE;
            $grandFemaleCesoAndEligibles += $femaleCesoAndEligibles;
            $grandFemaleCeso += $femaleCeso;
            $grandFemaleEligibles += $femaleEligibles;
        @endphp
        <tr>
            <td class="bold">
                {{ $no++ }}
            </td>

            <td class="bold">
                {{ $motherDepartmentAgencyDatas->title ?? '' }}
            </td>
            <th>
                {{ $totalPosition ?? 0 }}
            </th>
            <th class="bg-yellow text-red">
                {{ $vacantCESPosition ?? 0}}
            </th>
            <th class="bg-yellow text-red">
                {{ $vacantCESPositionPercentage ?? 0 }}%
            </th>
            <th>
                {{ $ceso ?? '0' }}
            </th>
            <th>
                {{ $eligibles ?? '0' }}
            </th>
            <th class="bg-cyan">
                {{ $cesosAndEligibles ?? '0' }}
            </th>
            <th class="bg-cyan">
                {{ $occupiedCESPercentage }}%

            </th>
            <th>
                {{ $csee ?? 0 }}
            </th>
            <th>
                {{ $nonCesEligible ?? 0 }}
            </th>
            <th class="bg-green">
                {{ $nonCesosAndNonEligibles ?? 0 }}
            </th>
            <th class="bg-green">
                {{ $occupiedNonCESPercentage ?? 0}}%
            </th>
            <th>
                {{ $maleCeso ?? 0 }}
            </th>
            <th>
                {{ $maleEligibles ?? 0 }}
            </th>
            <th class="bg-cyan">
                {{ $maleCesoAndEligibles ?? 0 }}
            </th>
            <th class="bg-cyan">
                %
            </th>
            <th>
                {{ $maleCSEE ?? 0}}
            </th>
            <th>
                {{ $maleNonCesEligibles ?? 0 }}
            </th>
            <th class="bg-green">
                {{ $maleNonCesNonEligibles ?? 0}}
            </th>
            <th class="bg-green">
                %
            </th>
            <th class="bg-cyan">
                {{ $countByMale ?? 0}}
            </th>
            <th class="bg-cyan">
                %
            </th>
            <th>
                {{ $femaleCeso ?? 0}}
            </th>
            <th>
            {{ $femaleEligibles ?? 0}}
            </th>
            <th class="bg-cyan">
                {{ $femaleCesoAndEligibles ?? 0 }}
            </th>
            <th class="bg-cyan">
                %
            </th>
            <th>
                {{ $femaleCSEE ?? 0 }}
            </th>
            <th>
                {{ $femaleNonCesNonEligibles ?? 0}}
            </th>
            <th class="bg-green">
                {{ $occupiedFemaleNonCesNonEligibles ?? 0 }}                
            </th>
            <th class="bg-green">
                %
            </th>
            <th class="bg-orange">
                {{ $countByFemale ?? 0 }}
            </th>
            <th class="bg-orange">
                %
            </th>
        </tr>
        @endforeach

        <tr class="bold" style="text-decoration: underline;">
            <td colspan="2" class="text-right bold">
                Grand Total:
            </td>
            <th>
                {{ $grandTotalPosition }}
            </th>
            <th class="bg-yellow text-red">
                {{ $grandVacantCESPosition }}
            </th>
            <th class="bg-yellow text-red">
                =
            </th>
            <th>
                {{ $grandCeso }}
            </th>
            <th>
                {{ $grandEligibles}}
            </th>
            <th class="bg-cyan">
                {{ $grandCesosAndEligibles }}
            </th>
            <th class="bg-cyan">
                =
            </th>
            <th>
                {{ $grandCsee }}
            </th>
            <th>
                {{ $grandNonCesEligible }}
            </th>
            <th class="bg-green">
                {{ $grandNonCesosAndNonEligibles }}
            </th>
            <th class="bg-green">
                =
            </th>
            <th>
                {{ $grandMaleCeso }}
            </th>
            <th>
                {{ $grandMaleEligibles }}
            </th>
            <th class="bg-cyan">
                {{ $grandMaleCesoAndEligibles }}
            </th>
            <th class="bg-cyan">
                =
            </th>
            <th>
                {{ $grandMaleCSEE }}
            </th>
            <th>
                {{ $grandMaleNonCesEligibles }}
            </th>
            <th class="bg-green">
                {{ $grandMaleNonCesNonEligibles }}
            </th>
            <th class="bg-green">
                %
            </th>
            <th class="bg-cyan">
                {{ $grandCountByMale }}
            </th>
            <th class="bg-cyan">
                %
            </th>
            <th>
                {{ $grandFemaleCeso }}
            </th>
            <th>
                {{ $grandFemaleEligibles }}
            </th>
            <th class="bg-cyan">
                {{ $grandFemaleCesoAndEligibles }}
            </th>
            <th class="bg-cyan">
                %
            </th>
            <th>
                {{ $grandFemaleCSEE }}
            </th>
            <th>
                {{ $grandFemaleNonCesNonEligibles }}
            </th>
            <th class="bg-green">
                {{ $grandOccupiedFemaleNonCesNonEligibles }}
            </th>
            <th class="bg-green">
                %
            </th>
            <th class="bg-orange">
                {{ $grandCountByFemale }}
            </th>
            <th class="bg-orange">
                %
            </th>
        </tr>


    </table>



    {{-- <table width="80%" style="border: 5px solid green">

        <td style="width:80%;">

            <table style="font-size:9px;width:100%;">
                <tr>
                    <th style="border: 1px solid #000;" rowspan="2">
                        SECTOR/AGENCY
                    </th>

                    <th style="border: 1px solid #000;background:#2E75B6;color:#fff;" colspan="11">
                        BY CES POSITION
                    </th>
                </tr>

                <tr>
                    <td style="border:1px solid black;padding:0px;margin:0">
                        <p class="rotate">
                            Total No. of CES Position
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            Total No. of Vacant CES Positions
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            %Vacant
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0">
                        <p class="rotate">
                            CESOs
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0">
                        <p class="rotate">
                            CES Eligibles
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0;" class="bg-cyan">
                        <p class="rotate">
                            Occupied by CESOs and CES Eligibles
                        </p>

                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0;" class="bg-cyan">
                        <p class="rotate">
                            %Occupied
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0">
                        <p class="rotate">
                            CSEEs
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0">
                        <p class="rotate">
                            Non-CES Eligible
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-green">
                        <p class="rotate">
                            Occupied by Non-CES Eligible
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-green">
                        <p class="rotate">
                            %Occupied
                        </p>
                    </td>
                </tr>

            </table>

        </td>

        <td style="width:80%;">

            <table style="font-size:9px;width:100%;">
                <tr>
                    <th style="border: 1px solid black;background: #604C78;color:#fff;" colspan="20">
                        BY GENDER
                    </th>
                </tr>
                <tr>
                    <th style="border: 1px solid black;" colspan="10" class="bg-cyan">
                        BY MALE
                    </th>
                    <th style="border: 1px solid black;" colspan="10" class="bg-orange">
                        BY FEMALE
                    </th>
                </tr>

                <tr>

                    <td style="border:1px solid black;padding:0px;margin:0">
                        <p class="rotate">
                            CESOs
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0">
                        <p class="rotate">
                            CES Eligibles
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-cyan">
                        <p class="rotate">
                            Occupied by CES Eligible
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-cyan">
                        <p class="rotate">
                            %Occupied
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0">
                        <p class="rotate">
                            CSEEs
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0">
                        <p class="rotate">
                            Non-CES Eligibles
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-green">
                        <p class="rotate">
                            Occupied by Non-CES Eligible
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-green">
                        <p class="rotate">
                            %Occupied
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-cyan">
                        <p class="rotate">
                            Total No. of Male
                        </p>
                    </td>

                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-cyan">
                        <p class="rotate">
                            Total % Occupied by Male
                        </p>
                    </td>



                    <td style="border:1px solid black;padding:0px;margin:0">
                        <p class="rotate">
                            female
                        </p>
                    </td>

                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            female
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            female
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            female
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            female
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            female
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            female
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            female
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            female
                        </p>
                    </td>
                    <td style="border:1px solid black;padding:0px;margin:0" class="bg-yellow text-red">
                        <p class="rotate">
                            female
                        </p>
                    </td>
                </tr>

            </table>

        </td>

    </table> --}}





</body>

</html>