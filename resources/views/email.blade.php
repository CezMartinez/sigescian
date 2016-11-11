<!DOCTYPE html>
<html>
<head>
    <style>
        /*
 * The MIT License
 * Copyright (c) 2012 Matias Meno <m@tias.me>
 */
        @-webkit-keyframes passing-through {
            0% {
                opacity: 0;
                -webkit-transform: translateY(40px);
                -moz-transform: translateY(40px);
                -ms-transform: translateY(40px);
                -o-transform: translateY(40px);
                transform: translateY(40px); }
            30%, 70% {
                opacity: 1;
                -webkit-transform: translateY(0px);
                -moz-transform: translateY(0px);
                -ms-transform: translateY(0px);
                -o-transform: translateY(0px);
                transform: translateY(0px); }
            100% {
                opacity: 0;
                -webkit-transform: translateY(-40px);
                -moz-transform: translateY(-40px);
                -ms-transform: translateY(-40px);
                -o-transform: translateY(-40px);
                transform: translateY(-40px); } }
        @-moz-keyframes passing-through {
            0% {
                opacity: 0;
                -webkit-transform: translateY(40px);
                -moz-transform: translateY(40px);
                -ms-transform: translateY(40px);
                -o-transform: translateY(40px);
                transform: translateY(40px); }
            30%, 70% {
                opacity: 1;
                -webkit-transform: translateY(0px);
                -moz-transform: translateY(0px);
                -ms-transform: translateY(0px);
                -o-transform: translateY(0px);
                transform: translateY(0px); }
            100% {
                opacity: 0;
                -webkit-transform: translateY(-40px);
                -moz-transform: translateY(-40px);
                -ms-transform: translateY(-40px);
                -o-transform: translateY(-40px);
                transform: translateY(-40px); } }
        @keyframes passing-through {
            0% {
                opacity: 0;
                -webkit-transform: translateY(40px);
                -moz-transform: translateY(40px);
                -ms-transform: translateY(40px);
                -o-transform: translateY(40px);
                transform: translateY(40px); }
            30%, 70% {
                opacity: 1;
                -webkit-transform: translateY(0px);
                -moz-transform: translateY(0px);
                -ms-transform: translateY(0px);
                -o-transform: translateY(0px);
                transform: translateY(0px); }
            100% {
                opacity: 0;
                -webkit-transform: translateY(-40px);
                -moz-transform: translateY(-40px);
                -ms-transform: translateY(-40px);
                -o-transform: translateY(-40px);
                transform: translateY(-40px); } }
        @-webkit-keyframes slide-in {
            0% {
                opacity: 0;
                -webkit-transform: translateY(40px);
                -moz-transform: translateY(40px);
                -ms-transform: translateY(40px);
                -o-transform: translateY(40px);
                transform: translateY(40px); }
            30% {
                opacity: 1;
                -webkit-transform: translateY(0px);
                -moz-transform: translateY(0px);
                -ms-transform: translateY(0px);
                -o-transform: translateY(0px);
                transform: translateY(0px); } }
        @-moz-keyframes slide-in {
            0% {
                opacity: 0;
                -webkit-transform: translateY(40px);
                -moz-transform: translateY(40px);
                -ms-transform: translateY(40px);
                -o-transform: translateY(40px);
                transform: translateY(40px); }
            30% {
                opacity: 1;
                -webkit-transform: translateY(0px);
                -moz-transform: translateY(0px);
                -ms-transform: translateY(0px);
                -o-transform: translateY(0px);
                transform: translateY(0px); } }
        @keyframes slide-in {
            0% {
                opacity: 0;
                -webkit-transform: translateY(40px);
                -moz-transform: translateY(40px);
                -ms-transform: translateY(40px);
                -o-transform: translateY(40px);
                transform: translateY(40px); }
            30% {
                opacity: 1;
                -webkit-transform: translateY(0px);
                -moz-transform: translateY(0px);
                -ms-transform: translateY(0px);
                -o-transform: translateY(0px);
                transform: translateY(0px); } }
        @-webkit-keyframes pulse {
            0% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1); }
            10% {
                -webkit-transform: scale(1.1);
                -moz-transform: scale(1.1);
                -ms-transform: scale(1.1);
                -o-transform: scale(1.1);
                transform: scale(1.1); }
            20% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1); } }
        @-moz-keyframes pulse {
            0% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1); }
            10% {
                -webkit-transform: scale(1.1);
                -moz-transform: scale(1.1);
                -ms-transform: scale(1.1);
                -o-transform: scale(1.1);
                transform: scale(1.1); }
            20% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1); } }
        @keyframes pulse {
            0% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1); }
            10% {
                -webkit-transform: scale(1.1);
                -moz-transform: scale(1.1);
                -ms-transform: scale(1.1);
                -o-transform: scale(1.1);
                transform: scale(1.1); }
            20% {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1); } }
        .dropzone, .dropzone * {
            box-sizing: border-box; }

        .dropzone {
            min-height: 150px;
            border: 2px solid rgba(0, 0, 0, 0.3);
            background: white;
            padding: 20px 20px; }
        .dropzone.dz-clickable {
            cursor: pointer; }
        .dropzone.dz-clickable * {
            cursor: default; }
        .dropzone.dz-clickable .dz-message, .dropzone.dz-clickable .dz-message * {
            cursor: pointer; }
        .dropzone.dz-started .dz-message {
            display: none; }
        .dropzone.dz-drag-hover {
            border-style: solid; }
        .dropzone.dz-drag-hover .dz-message {
            opacity: 0.5; }
        .dropzone .dz-message {
            text-align: center;
            margin: 2em 0; }
        .dropzone .dz-preview {
            position: relative;
            display: inline-block;
            vertical-align: top;
            margin: 16px;
            min-height: 100px; }
        .dropzone .dz-preview:hover {
            z-index: 1000; }
        .dropzone .dz-preview:hover .dz-details {
            opacity: 1; }
        .dropzone .dz-preview.dz-file-preview .dz-image {
            border-radius: 20px;
            background: #999;
            background: linear-gradient(to bottom, #eee, #ddd); }
        .dropzone .dz-preview.dz-file-preview .dz-details {
            opacity: 1; }
        .dropzone .dz-preview.dz-image-preview {
            background: white; }
        .dropzone .dz-preview.dz-image-preview .dz-details {
            -webkit-transition: opacity 0.2s linear;
            -moz-transition: opacity 0.2s linear;
            -ms-transition: opacity 0.2s linear;
            -o-transition: opacity 0.2s linear;
            transition: opacity 0.2s linear; }
        .dropzone .dz-preview .dz-remove {
            font-size: 14px;
            text-align: center;
            display: block;
            cursor: pointer;
            border: none; }
        .dropzone .dz-preview .dz-remove:hover {
            text-decoration: underline; }
        .dropzone .dz-preview:hover .dz-details {
            opacity: 1; }
        .dropzone .dz-preview .dz-details {
            z-index: 20;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            font-size: 13px;
            min-width: 100%;
            max-width: 100%;
            padding: 2em 1em;
            text-align: center;
            color: rgba(0, 0, 0, 0.9);
            line-height: 150%; }
        .dropzone .dz-preview .dz-details .dz-size {
            margin-bottom: 1em;
            font-size: 16px; }
        .dropzone .dz-preview .dz-details .dz-filename {
            white-space: nowrap; }
        .dropzone .dz-preview .dz-details .dz-filename:hover span {
            border: 1px solid rgba(200, 200, 200, 0.8);
            background-color: rgba(255, 255, 255, 0.8); }
        .dropzone .dz-preview .dz-details .dz-filename:not(:hover) {
            overflow: hidden;
            text-overflow: ellipsis; }
        .dropzone .dz-preview .dz-details .dz-filename:not(:hover) span {
            border: 1px solid transparent; }
        .dropzone .dz-preview .dz-details .dz-filename span, .dropzone .dz-preview .dz-details .dz-size span {
            background-color: rgba(255, 255, 255, 0.4);
            padding: 0 0.4em;
            border-radius: 3px; }
        .dropzone .dz-preview:hover .dz-image img {
            -webkit-transform: scale(1.05, 1.05);
            -moz-transform: scale(1.05, 1.05);
            -ms-transform: scale(1.05, 1.05);
            -o-transform: scale(1.05, 1.05);
            transform: scale(1.05, 1.05);
            -webkit-filter: blur(8px);
            filter: blur(8px); }
        .dropzone .dz-preview .dz-image {
            border-radius: 20px;
            overflow: hidden;
            width: 120px;
            height: 120px;
            position: relative;
            display: block;
            z-index: 10; }
        .dropzone .dz-preview .dz-image img {
            display: block; }
        .dropzone .dz-preview.dz-success .dz-success-mark {
            -webkit-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
            -moz-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
            -ms-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
            -o-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
            animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1); }
        .dropzone .dz-preview.dz-error .dz-error-mark {
            opacity: 1;
            -webkit-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
            -moz-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
            -ms-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
            -o-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
            animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1); }
        .dropzone .dz-preview .dz-success-mark, .dropzone .dz-preview .dz-error-mark {
            pointer-events: none;
            opacity: 0;
            z-index: 500;
            position: absolute;
            display: block;
            top: 50%;
            left: 50%;
            margin-left: -27px;
            margin-top: -27px; }
        .dropzone .dz-preview .dz-success-mark svg, .dropzone .dz-preview .dz-error-mark svg {
            display: block;
            width: 54px;
            height: 54px; }
        .dropzone .dz-preview.dz-processing .dz-progress {
            opacity: 1;
            -webkit-transition: all 0.2s linear;
            -moz-transition: all 0.2s linear;
            -ms-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear; }
        .dropzone .dz-preview.dz-complete .dz-progress {
            opacity: 0;
            -webkit-transition: opacity 0.4s ease-in;
            -moz-transition: opacity 0.4s ease-in;
            -ms-transition: opacity 0.4s ease-in;
            -o-transition: opacity 0.4s ease-in;
            transition: opacity 0.4s ease-in; }
        .dropzone .dz-preview:not(.dz-processing) .dz-progress {
            -webkit-animation: pulse 6s ease infinite;
            -moz-animation: pulse 6s ease infinite;
            -ms-animation: pulse 6s ease infinite;
            -o-animation: pulse 6s ease infinite;
            animation: pulse 6s ease infinite; }
        .dropzone .dz-preview .dz-progress {
            opacity: 1;
            z-index: 1000;
            pointer-events: none;
            position: absolute;
            height: 16px;
            left: 50%;
            top: 50%;
            margin-top: -8px;
            width: 80px;
            margin-left: -40px;
            background: rgba(255, 255, 255, 0.9);
            -webkit-transform: scale(1);
            border-radius: 8px;
            overflow: hidden; }
        .dropzone .dz-preview .dz-progress .dz-upload {
            background: #333;
            background: linear-gradient(to bottom, #666, #444);
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 0;
            -webkit-transition: width 300ms ease-in-out;
            -moz-transition: width 300ms ease-in-out;
            -ms-transition: width 300ms ease-in-out;
            -o-transition: width 300ms ease-in-out;
            transition: width 300ms ease-in-out; }
        .dropzone .dz-preview.dz-error .dz-error-message {
            display: block; }
        .dropzone .dz-preview.dz-error:hover .dz-error-message {
            opacity: 1;
            pointer-events: auto; }
        .dropzone .dz-preview .dz-error-message {
            pointer-events: none;
            z-index: 1000;
            position: absolute;
            display: block;
            display: none;
            opacity: 0;
            -webkit-transition: opacity 0.3s ease;
            -moz-transition: opacity 0.3s ease;
            -ms-transition: opacity 0.3s ease;
            -o-transition: opacity 0.3s ease;
            transition: opacity 0.3s ease;
            border-radius: 8px;
            font-size: 13px;
            top: 130px;
            left: -10px;
            width: 140px;
            background: #be2626;
            background: linear-gradient(to bottom, #be2626, #a92222);
            padding: 0.5em 1.2em;
            color: white; }
        .dropzone .dz-preview .dz-error-message:after {
            content: '';
            position: absolute;
            top: -6px;
            left: 64px;
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #be2626; }

        /*!
 * Bootstrap v3.3.4 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

        /*! normalize.css v3.0.2 | MIT License | git.io/normalize */
        html {
            font-family: sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        body {
            margin: 0;
        }
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        menu,
        nav,
        section,
        summary {
            display: block;
        }
        audio,
        canvas,
        progress,
        video {
            display: inline-block;
            vertical-align: baseline;
        }
        audio:not([controls]) {
            display: none;
            height: 0;
        }
        [hidden],
        template {
            display: none;
        }
        a {
            background-color: transparent;
        }
        a:active,
        a:hover {
            outline: 0;
        }
        abbr[title] {
            border-bottom: 1px dotted;
        }
        b,
        strong {
            font-weight: bold;
        }
        dfn {
            font-style: italic;
        }
        h1 {
            margin: .67em 0;
            font-size: 2em;
        }
        mark {
            color: #000;
            background: #ff0;
        }
        small {
            font-size: 80%;
        }
        sub,
        sup {
            position: relative;
            font-size: 75%;
            line-height: 0;
            vertical-align: baseline;
        }
        sup {
            top: -.5em;
        }
        sub {
            bottom: -.25em;
        }
        img {
            border: 0;
        }
        svg:not(:root) {
            overflow: hidden;
        }
        figure {
            margin: 1em 40px;
        }
        hr {
            height: 0;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
        }
        pre {
            overflow: auto;
        }
        code,
        kbd,
        pre,
        samp {
            font-family: monospace, monospace;
            font-size: 1em;
        }
        button,
        input,
        optgroup,
        select,
        textarea {
            margin: 0;
            font: inherit;
            color: inherit;
        }
        button {
            overflow: visible;
        }
        button,
        select {
            text-transform: none;
        }
        button,
        html input[type="button"],
        input[type="reset"],
        input[type="submit"] {
            -webkit-appearance: button;
            cursor: pointer;
        }
        button[disabled],
        html input[disabled] {
            cursor: default;
        }
        button::-moz-focus-inner,
        input::-moz-focus-inner {
            padding: 0;
            border: 0;
        }
        input {
            line-height: normal;
        }
        input[type="checkbox"],
        input[type="radio"] {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0;
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            height: auto;
        }
        input[type="search"] {
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            -webkit-appearance: textfield;
        }
        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-decoration {
            -webkit-appearance: none;
        }
        fieldset {
            padding: .35em .625em .75em;
            margin: 0 2px;
            border: 1px solid #c0c0c0;
        }
        legend {
            padding: 0;
            border: 0;
        }
        textarea {
            overflow: auto;
        }
        optgroup {
            font-weight: bold;
        }
        table {
            border-spacing: 0;
            border-collapse: collapse;
        }
        td,
        th {
            padding: 0;
        }
        /*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */
        @media print {
            *,
            *:before,
            *:after {
                color: #000 !important;
                text-shadow: none !important;
                background: transparent !important;
                -webkit-box-shadow: none !important;
                box-shadow: none !important;
            }
            a,
            a:visited {
                text-decoration: underline;
            }
            a[href]:after {
                content: " (" attr(href) ")";
            }
            abbr[title]:after {
                content: " (" attr(title) ")";
            }
            a[href^="#"]:after,
            a[href^="javascript:"]:after {
                content: "";
            }
            pre,
            blockquote {
                border: 1px solid #999;

                page-break-inside: avoid;
            }
            thead {
                display: table-header-group;
            }
            tr,
            img {
                page-break-inside: avoid;
            }
            img {
                max-width: 100% !important;
            }
            p,
            h2,
            h3 {
                orphans: 3;
                widows: 3;
            }
            h2,
            h3 {
                page-break-after: avoid;
            }
            select {
                background: #fff !important;
            }
            .navbar {
                display: none;
            }
            .btn > .caret,
            .dropup > .btn > .caret {
                border-top-color: #000 !important;
            }
            .label {
                border: 1px solid #000;
            }
            .table {
                border-collapse: collapse !important;
            }
            .table td,
            .table th {
                background-color: #fff !important;
            }
            .table-bordered th,
            .table-bordered td {
                border: 1px solid #ddd !important;
            }
        }
        @font-face {
            font-family: 'Glyphicons Halflings';

            src: url('../fonts/glyphicons-halflings-regular.eot');
            src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
        }
        .glyphicon {
            position: relative;
            top: 1px;
            display: inline-block;
            font-family: 'Glyphicons Halflings';
            font-style: normal;
            font-weight: normal;
            line-height: 1;

            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .glyphicon-asterisk:before {
            content: "\2a";
        }
        .glyphicon-plus:before {
            content: "\2b";
        }
        .glyphicon-euro:before,
        .glyphicon-eur:before {
            content: "\20ac";
        }
        .glyphicon-minus:before {
            content: "\2212";
        }
        .glyphicon-cloud:before {
            content: "\2601";
        }
        .glyphicon-envelope:before {
            content: "\2709";
        }
        .glyphicon-pencil:before {
            content: "\270f";
        }
        .glyphicon-glass:before {
            content: "\e001";
        }
        .glyphicon-music:before {
            content: "\e002";
        }
        .glyphicon-search:before {
            content: "\e003";
        }
        .glyphicon-heart:before {
            content: "\e005";
        }
        .glyphicon-star:before {
            content: "\e006";
        }
        .glyphicon-star-empty:before {
            content: "\e007";
        }
        .glyphicon-user:before {
            content: "\e008";
        }
        .glyphicon-film:before {
            content: "\e009";
        }
        .glyphicon-th-large:before {
            content: "\e010";
        }
        .glyphicon-th:before {
            content: "\e011";
        }
        .glyphicon-th-list:before {
            content: "\e012";
        }
        .glyphicon-ok:before {
            content: "\e013";
        }
        .glyphicon-remove:before {
            content: "\e014";
        }
        .glyphicon-zoom-in:before {
            content: "\e015";
        }
        .glyphicon-zoom-out:before {
            content: "\e016";
        }
        .glyphicon-off:before {
            content: "\e017";
        }
        .glyphicon-signal:before {
            content: "\e018";
        }
        .glyphicon-cog:before {
            content: "\e019";
        }
        .glyphicon-trash:before {
            content: "\e020";
        }
        .glyphicon-home:before {
            content: "\e021";
        }
        .glyphicon-file:before {
            content: "\e022";
        }
        .glyphicon-time:before {
            content: "\e023";
        }
        .glyphicon-road:before {
            content: "\e024";
        }
        .glyphicon-download-alt:before {
            content: "\e025";
        }
        .glyphicon-download:before {
            content: "\e026";
        }
        .glyphicon-upload:before {
            content: "\e027";
        }
        .glyphicon-inbox:before {
            content: "\e028";
        }
        .glyphicon-play-circle:before {
            content: "\e029";
        }
        .glyphicon-repeat:before {
            content: "\e030";
        }
        .glyphicon-refresh:before {
            content: "\e031";
        }
        .glyphicon-list-alt:before {
            content: "\e032";
        }
        .glyphicon-lock:before {
            content: "\e033";
        }
        .glyphicon-flag:before {
            content: "\e034";
        }
        .glyphicon-headphones:before {
            content: "\e035";
        }
        .glyphicon-volume-off:before {
            content: "\e036";
        }
        .glyphicon-volume-down:before {
            content: "\e037";
        }
        .glyphicon-volume-up:before {
            content: "\e038";
        }
        .glyphicon-qrcode:before {
            content: "\e039";
        }
        .glyphicon-barcode:before {
            content: "\e040";
        }
        .glyphicon-tag:before {
            content: "\e041";
        }
        .glyphicon-tags:before {
            content: "\e042";
        }
        .glyphicon-book:before {
            content: "\e043";
        }
        .glyphicon-bookmark:before {
            content: "\e044";
        }
        .glyphicon-print:before {
            content: "\e045";
        }
        .glyphicon-camera:before {
            content: "\e046";
        }
        .glyphicon-font:before {
            content: "\e047";
        }
        .glyphicon-bold:before {
            content: "\e048";
        }
        .glyphicon-italic:before {
            content: "\e049";
        }
        .glyphicon-text-height:before {
            content: "\e050";
        }
        .glyphicon-text-width:before {
            content: "\e051";
        }
        .glyphicon-align-left:before {
            content: "\e052";
        }
        .glyphicon-align-center:before {
            content: "\e053";
        }
        .glyphicon-align-right:before {
            content: "\e054";
        }
        .glyphicon-align-justify:before {
            content: "\e055";
        }
        .glyphicon-list:before {
            content: "\e056";
        }
        .glyphicon-indent-left:before {
            content: "\e057";
        }
        .glyphicon-indent-right:before {
            content: "\e058";
        }
        .glyphicon-facetime-video:before {
            content: "\e059";
        }
        .glyphicon-picture:before {
            content: "\e060";
        }
        .glyphicon-map-marker:before {
            content: "\e062";
        }
        .glyphicon-adjust:before {
            content: "\e063";
        }
        .glyphicon-tint:before {
            content: "\e064";
        }
        .glyphicon-edit:before {
            content: "\e065";
        }
        .glyphicon-share:before {
            content: "\e066";
        }
        .glyphicon-check:before {
            content: "\e067";
        }
        .glyphicon-move:before {
            content: "\e068";
        }
        .glyphicon-step-backward:before {
            content: "\e069";
        }
        .glyphicon-fast-backward:before {
            content: "\e070";
        }
        .glyphicon-backward:before {
            content: "\e071";
        }
        .glyphicon-play:before {
            content: "\e072";
        }
        .glyphicon-pause:before {
            content: "\e073";
        }
        .glyphicon-stop:before {
            content: "\e074";
        }
        .glyphicon-forward:before {
            content: "\e075";
        }
        .glyphicon-fast-forward:before {
            content: "\e076";
        }
        .glyphicon-step-forward:before {
            content: "\e077";
        }
        .glyphicon-eject:before {
            content: "\e078";
        }
        .glyphicon-chevron-left:before {
            content: "\e079";
        }
        .glyphicon-chevron-right:before {
            content: "\e080";
        }
        .glyphicon-plus-sign:before {
            content: "\e081";
        }
        .glyphicon-minus-sign:before {
            content: "\e082";
        }
        .glyphicon-remove-sign:before {
            content: "\e083";
        }
        .glyphicon-ok-sign:before {
            content: "\e084";
        }
        .glyphicon-question-sign:before {
            content: "\e085";
        }
        .glyphicon-info-sign:before {
            content: "\e086";
        }
        .glyphicon-screenshot:before {
            content: "\e087";
        }
        .glyphicon-remove-circle:before {
            content: "\e088";
        }
        .glyphicon-ok-circle:before {
            content: "\e089";
        }
        .glyphicon-ban-circle:before {
            content: "\e090";
        }
        .glyphicon-arrow-left:before {
            content: "\e091";
        }
        .glyphicon-arrow-right:before {
            content: "\e092";
        }
        .glyphicon-arrow-up:before {
            content: "\e093";
        }
        .glyphicon-arrow-down:before {
            content: "\e094";
        }
        .glyphicon-share-alt:before {
            content: "\e095";
        }
        .glyphicon-resize-full:before {
            content: "\e096";
        }
        .glyphicon-resize-small:before {
            content: "\e097";
        }
        .glyphicon-exclamation-sign:before {
            content: "\e101";
        }
        .glyphicon-gift:before {
            content: "\e102";
        }
        .glyphicon-leaf:before {
            content: "\e103";
        }
        .glyphicon-fire:before {
            content: "\e104";
        }
        .glyphicon-eye-open:before {
            content: "\e105";
        }
        .glyphicon-eye-close:before {
            content: "\e106";
        }
        .glyphicon-warning-sign:before {
            content: "\e107";
        }
        .glyphicon-plane:before {
            content: "\e108";
        }
        .glyphicon-calendar:before {
            content: "\e109";
        }
        .glyphicon-random:before {
            content: "\e110";
        }
        .glyphicon-comment:before {
            content: "\e111";
        }
        .glyphicon-magnet:before {
            content: "\e112";
        }
        .glyphicon-chevron-up:before {
            content: "\e113";
        }
        .glyphicon-chevron-down:before {
            content: "\e114";
        }
        .glyphicon-retweet:before {
            content: "\e115";
        }
        .glyphicon-shopping-cart:before {
            content: "\e116";
        }
        .glyphicon-folder-close:before {
            content: "\e117";
        }
        .glyphicon-folder-open:before {
            content: "\e118";
        }
        .glyphicon-resize-vertical:before {
            content: "\e119";
        }
        .glyphicon-resize-horizontal:before {
            content: "\e120";
        }
        .glyphicon-hdd:before {
            content: "\e121";
        }
        .glyphicon-bullhorn:before {
            content: "\e122";
        }
        .glyphicon-bell:before {
            content: "\e123";
        }
        .glyphicon-certificate:before {
            content: "\e124";
        }
        .glyphicon-thumbs-up:before {
            content: "\e125";
        }
        .glyphicon-thumbs-down:before {
            content: "\e126";
        }
        .glyphicon-hand-right:before {
            content: "\e127";
        }
        .glyphicon-hand-left:before {
            content: "\e128";
        }
        .glyphicon-hand-up:before {
            content: "\e129";
        }
        .glyphicon-hand-down:before {
            content: "\e130";
        }
        .glyphicon-circle-arrow-right:before {
            content: "\e131";
        }
        .glyphicon-circle-arrow-left:before {
            content: "\e132";
        }
        .glyphicon-circle-arrow-up:before {
            content: "\e133";
        }
        .glyphicon-circle-arrow-down:before {
            content: "\e134";
        }
        .glyphicon-globe:before {
            content: "\e135";
        }
        .glyphicon-wrench:before {
            content: "\e136";
        }
        .glyphicon-tasks:before {
            content: "\e137";
        }
        .glyphicon-filter:before {
            content: "\e138";
        }
        .glyphicon-briefcase:before {
            content: "\e139";
        }
        .glyphicon-fullscreen:before {
            content: "\e140";
        }
        .glyphicon-dashboard:before {
            content: "\e141";
        }
        .glyphicon-paperclip:before {
            content: "\e142";
        }
        .glyphicon-heart-empty:before {
            content: "\e143";
        }
        .glyphicon-link:before {
            content: "\e144";
        }
        .glyphicon-phone:before {
            content: "\e145";
        }
        .glyphicon-pushpin:before {
            content: "\e146";
        }
        .glyphicon-usd:before {
            content: "\e148";
        }
        .glyphicon-gbp:before {
            content: "\e149";
        }
        .glyphicon-sort:before {
            content: "\e150";
        }
        .glyphicon-sort-by-alphabet:before {
            content: "\e151";
        }
        .glyphicon-sort-by-alphabet-alt:before {
            content: "\e152";
        }
        .glyphicon-sort-by-order:before {
            content: "\e153";
        }
        .glyphicon-sort-by-order-alt:before {
            content: "\e154";
        }
        .glyphicon-sort-by-attributes:before {
            content: "\e155";
        }
        .glyphicon-sort-by-attributes-alt:before {
            content: "\e156";
        }
        .glyphicon-unchecked:before {
            content: "\e157";
        }
        .glyphicon-expand:before {
            content: "\e158";
        }
        .glyphicon-collapse-down:before {
            content: "\e159";
        }
        .glyphicon-collapse-up:before {
            content: "\e160";
        }
        .glyphicon-log-in:before {
            content: "\e161";
        }
        .glyphicon-flash:before {
            content: "\e162";
        }
        .glyphicon-log-out:before {
            content: "\e163";
        }
        .glyphicon-new-window:before {
            content: "\e164";
        }
        .glyphicon-record:before {
            content: "\e165";
        }
        .glyphicon-save:before {
            content: "\e166";
        }
        .glyphicon-open:before {
            content: "\e167";
        }
        .glyphicon-saved:before {
            content: "\e168";
        }
        .glyphicon-import:before {
            content: "\e169";
        }
        .glyphicon-export:before {
            content: "\e170";
        }
        .glyphicon-send:before {
            content: "\e171";
        }
        .glyphicon-floppy-disk:before {
            content: "\e172";
        }
        .glyphicon-floppy-saved:before {
            content: "\e173";
        }
        .glyphicon-floppy-remove:before {
            content: "\e174";
        }
        .glyphicon-floppy-save:before {
            content: "\e175";
        }
        .glyphicon-floppy-open:before {
            content: "\e176";
        }
        .glyphicon-credit-card:before {
            content: "\e177";
        }
        .glyphicon-transfer:before {
            content: "\e178";
        }
        .glyphicon-cutlery:before {
            content: "\e179";
        }
        .glyphicon-header:before {
            content: "\e180";
        }
        .glyphicon-compressed:before {
            content: "\e181";
        }
        .glyphicon-earphone:before {
            content: "\e182";
        }
        .glyphicon-phone-alt:before {
            content: "\e183";
        }
        .glyphicon-tower:before {
            content: "\e184";
        }
        .glyphicon-stats:before {
            content: "\e185";
        }
        .glyphicon-sd-video:before {
            content: "\e186";
        }
        .glyphicon-hd-video:before {
            content: "\e187";
        }
        .glyphicon-subtitles:before {
            content: "\e188";
        }
        .glyphicon-sound-stereo:before {
            content: "\e189";
        }
        .glyphicon-sound-dolby:before {
            content: "\e190";
        }
        .glyphicon-sound-5-1:before {
            content: "\e191";
        }
        .glyphicon-sound-6-1:before {
            content: "\e192";
        }
        .glyphicon-sound-7-1:before {
            content: "\e193";
        }
        .glyphicon-copyright-mark:before {
            content: "\e194";
        }
        .glyphicon-registration-mark:before {
            content: "\e195";
        }
        .glyphicon-cloud-download:before {
            content: "\e197";
        }
        .glyphicon-cloud-upload:before {
            content: "\e198";
        }
        .glyphicon-tree-conifer:before {
            content: "\e199";
        }
        .glyphicon-tree-deciduous:before {
            content: "\e200";
        }
        .glyphicon-cd:before {
            content: "\e201";
        }
        .glyphicon-save-file:before {
            content: "\e202";
        }
        .glyphicon-open-file:before {
            content: "\e203";
        }
        .glyphicon-level-up:before {
            content: "\e204";
        }
        .glyphicon-copy:before {
            content: "\e205";
        }
        .glyphicon-paste:before {
            content: "\e206";
        }
        .glyphicon-alert:before {
            content: "\e209";
        }
        .glyphicon-equalizer:before {
            content: "\e210";
        }
        .glyphicon-king:before {
            content: "\e211";
        }
        .glyphicon-queen:before {
            content: "\e212";
        }
        .glyphicon-pawn:before {
            content: "\e213";
        }
        .glyphicon-bishop:before {
            content: "\e214";
        }
        .glyphicon-knight:before {
            content: "\e215";
        }
        .glyphicon-baby-formula:before {
            content: "\e216";
        }
        .glyphicon-tent:before {
            content: "\26fa";
        }
        .glyphicon-blackboard:before {
            content: "\e218";
        }
        .glyphicon-bed:before {
            content: "\e219";
        }
        .glyphicon-apple:before {
            content: "\f8ff";
        }
        .glyphicon-erase:before {
            content: "\e221";
        }
        .glyphicon-hourglass:before {
            content: "\231b";
        }
        .glyphicon-lamp:before {
            content: "\e223";
        }
        .glyphicon-duplicate:before {
            content: "\e224";
        }
        .glyphicon-piggy-bank:before {
            content: "\e225";
        }
        .glyphicon-scissors:before {
            content: "\e226";
        }
        .glyphicon-bitcoin:before {
            content: "\e227";
        }
        .glyphicon-btc:before {
            content: "\e227";
        }
        .glyphicon-xbt:before {
            content: "\e227";
        }
        .glyphicon-yen:before {
            content: "\00a5";
        }
        .glyphicon-jpy:before {
            content: "\00a5";
        }
        .glyphicon-ruble:before {
            content: "\20bd";
        }
        .glyphicon-rub:before {
            content: "\20bd";
        }
        .glyphicon-scale:before {
            content: "\e230";
        }
        .glyphicon-ice-lolly:before {
            content: "\e231";
        }
        .glyphicon-ice-lolly-tasted:before {
            content: "\e232";
        }
        .glyphicon-education:before {
            content: "\e233";
        }
        .glyphicon-option-horizontal:before {
            content: "\e234";
        }
        .glyphicon-option-vertical:before {
            content: "\e235";
        }
        .glyphicon-menu-hamburger:before {
            content: "\e236";
        }
        .glyphicon-modal-window:before {
            content: "\e237";
        }
        .glyphicon-oil:before {
            content: "\e238";
        }
        .glyphicon-grain:before {
            content: "\e239";
        }
        .glyphicon-sunglasses:before {
            content: "\e240";
        }
        .glyphicon-text-size:before {
            content: "\e241";
        }
        .glyphicon-text-color:before {
            content: "\e242";
        }
        .glyphicon-text-background:before {
            content: "\e243";
        }
        .glyphicon-object-align-top:before {
            content: "\e244";
        }
        .glyphicon-object-align-bottom:before {
            content: "\e245";
        }
        .glyphicon-object-align-horizontal:before {
            content: "\e246";
        }
        .glyphicon-object-align-left:before {
            content: "\e247";
        }
        .glyphicon-object-align-vertical:before {
            content: "\e248";
        }
        .glyphicon-object-align-right:before {
            content: "\e249";
        }
        .glyphicon-triangle-right:before {
            content: "\e250";
        }
        .glyphicon-triangle-left:before {
            content: "\e251";
        }
        .glyphicon-triangle-bottom:before {
            content: "\e252";
        }
        .glyphicon-triangle-top:before {
            content: "\e253";
        }
        .glyphicon-console:before {
            content: "\e254";
        }
        .glyphicon-superscript:before {
            content: "\e255";
        }
        .glyphicon-subscript:before {
            content: "\e256";
        }
        .glyphicon-menu-left:before {
            content: "\e257";
        }
        .glyphicon-menu-right:before {
            content: "\e258";
        }
        .glyphicon-menu-down:before {
            content: "\e259";
        }
        .glyphicon-menu-up:before {
            content: "\e260";
        }
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        html {
            font-size: 10px;

            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
        }
        input,
        button,
        select,
        textarea {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
        }
        a {
            color: #337ab7;
            text-decoration: none;
        }
        a:hover,
        a:focus {
            color: #23527c;
            text-decoration: underline;
        }
        a:focus {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }
        figure {
            margin: 0;
        }
        img {
            vertical-align: middle;
        }
        .img-responsive,
        .thumbnail > img,
        .thumbnail a > img,
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            display: block;
            max-width: 100%;
            height: auto;
        }
        .img-rounded {
            border-radius: 6px;
        }
        .img-thumbnail {
            display: inline-block;
            max-width: 100%;
            height: auto;
            padding: 4px;
            line-height: 1.42857143;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }
        .img-circle {
            border-radius: 50%;
        }
        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee;
        }
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }
        .sr-only-focusable:active,
        .sr-only-focusable:focus {
            position: static;
            width: auto;
            height: auto;
            margin: 0;
            overflow: visible;
            clip: auto;
        }
        [role="button"] {
            cursor: pointer;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: inherit;
            font-weight: 500;
            line-height: 1.1;
            color: inherit;
        }
        h1 small,
        h2 small,
        h3 small,
        h4 small,
        h5 small,
        h6 small,
        .h1 small,
        .h2 small,
        .h3 small,
        .h4 small,
        .h5 small,
        .h6 small,
        h1 .small,
        h2 .small,
        h3 .small,
        h4 .small,
        h5 .small,
        h6 .small,
        .h1 .small,
        .h2 .small,
        .h3 .small,
        .h4 .small,
        .h5 .small,
        .h6 .small {
            font-weight: normal;
            line-height: 1;
            color: #777;
        }
        h1,
        .h1,
        h2,
        .h2,
        h3,
        .h3 {
            margin-top: 20px;
            margin-bottom: 10px;
        }
        h1 small,
        .h1 small,
        h2 small,
        .h2 small,
        h3 small,
        .h3 small,
        h1 .small,
        .h1 .small,
        h2 .small,
        .h2 .small,
        h3 .small,
        .h3 .small {
            font-size: 65%;
        }
        h4,
        .h4,
        h5,
        .h5,
        h6,
        .h6 {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        h4 small,
        .h4 small,
        h5 small,
        .h5 small,
        h6 small,
        .h6 small,
        h4 .small,
        .h4 .small,
        h5 .small,
        .h5 .small,
        h6 .small,
        .h6 .small {
            font-size: 75%;
        }
        h1,
        .h1 {
            font-size: 36px;
        }
        h2,
        .h2 {
            font-size: 30px;
        }
        h3,
        .h3 {
            font-size: 24px;
        }
        h4,
        .h4 {
            font-size: 18px;
        }
        h5,
        .h5 {
            font-size: 14px;
        }
        h6,
        .h6 {
            font-size: 12px;
        }
        p {
            margin: 0 0 10px;
        }
        .lead {
            margin-bottom: 20px;
            font-size: 16px;
            font-weight: 300;
            line-height: 1.4;
        }
        @media (min-width: 768px) {
            .lead {
                font-size: 21px;
            }
        }
        small,
        .small {
            font-size: 85%;
        }
        mark,
        .mark {
            padding: .2em;
            background-color: #fcf8e3;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .text-justify {
            text-align: justify;
        }
        .text-nowrap {
            white-space: nowrap;
        }
        .text-lowercase {
            text-transform: lowercase;
        }
        .text-uppercase {
            text-transform: uppercase;
        }
        .text-capitalize {
            text-transform: capitalize;
        }
        .text-muted {
            color: #777;
        }
        .text-primary {
            color: #337ab7;
        }
        a.text-primary:hover {
            color: #286090;
        }
        .text-success {
            color: #3c763d;
        }
        a.text-success:hover {
            color: #2b542c;
        }
        .text-info {
            color: #31708f;
        }
        a.text-info:hover {
            color: #245269;
        }
        .text-warning {
            color: #8a6d3b;
        }
        a.text-warning:hover {
            color: #66512c;
        }
        .text-danger {
            color: #a94442;
        }
        a.text-danger:hover {
            color: #843534;
        }
        .bg-primary {
            color: #fff;
            background-color: #337ab7;
        }
        a.bg-primary:hover {
            background-color: #286090;
        }
        .bg-success {
            background-color: #dff0d8;
        }
        a.bg-success:hover {
            background-color: #c1e2b3;
        }
        .bg-info {
            background-color: #d9edf7;
        }
        a.bg-info:hover {
            background-color: #afd9ee;
        }
        .bg-warning {
            background-color: #fcf8e3;
        }
        a.bg-warning:hover {
            background-color: #f7ecb5;
        }
        .bg-danger {
            background-color: #f2dede;
        }
        a.bg-danger:hover {
            background-color: #e4b9b9;
        }
        .page-header {
            padding-bottom: 9px;
            margin: 40px 0 20px;
            border-bottom: 1px solid #eee;
        }
        ul,
        ol {
            margin-top: 0;
            margin-bottom: 10px;
        }
        ul ul,
        ol ul,
        ul ol,
        ol ol {
            margin-bottom: 0;
        }
        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }
        .list-inline {
            padding-left: 0;
            margin-left: -5px;
            list-style: none;
        }
        .list-inline > li {
            display: inline-block;
            padding-right: 5px;
            padding-left: 5px;
        }
        dl {
            margin-top: 0;
            margin-bottom: 20px;
        }
        dt,
        dd {
            line-height: 1.42857143;
        }
        dt {
            font-weight: bold;
        }
        dd {
            margin-left: 0;
        }
        @media (min-width: 768px) {
            .dl-horizontal dt {
                float: left;
                width: 160px;
                overflow: hidden;
                clear: left;
                text-align: right;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .dl-horizontal dd {
                margin-left: 180px;
            }
        }
        abbr[title],
        abbr[data-original-title] {
            cursor: help;
            border-bottom: 1px dotted #777;
        }
        .initialism {
            font-size: 90%;
            text-transform: uppercase;
        }
        blockquote {
            padding: 10px 20px;
            margin: 0 0 20px;
            font-size: 17.5px;
            border-left: 5px solid #eee;
        }
        blockquote p:last-child,
        blockquote ul:last-child,
        blockquote ol:last-child {
            margin-bottom: 0;
        }
        blockquote footer,
        blockquote small,
        blockquote .small {
            display: block;
            font-size: 80%;
            line-height: 1.42857143;
            color: #777;
        }
        blockquote footer:before,
        blockquote small:before,
        blockquote .small:before {
            content: '\2014 \00A0';
        }
        .blockquote-reverse,
        blockquote.pull-right {
            padding-right: 15px;
            padding-left: 0;
            text-align: right;
            border-right: 5px solid #eee;
            border-left: 0;
        }
        .blockquote-reverse footer:before,
        blockquote.pull-right footer:before,
        .blockquote-reverse small:before,
        blockquote.pull-right small:before,
        .blockquote-reverse .small:before,
        blockquote.pull-right .small:before {
            content: '';
        }
        .blockquote-reverse footer:after,
        blockquote.pull-right footer:after,
        .blockquote-reverse small:after,
        blockquote.pull-right small:after,
        .blockquote-reverse .small:after,
        blockquote.pull-right .small:after {
            content: '\00A0 \2014';
        }
        address {
            margin-bottom: 20px;
            font-style: normal;
            line-height: 1.42857143;
        }
        code,
        kbd,
        pre,
        samp {
            font-family: Menlo, Monaco, Consolas, "Courier New", monospace;
        }
        code {
            padding: 2px 4px;
            font-size: 90%;
            color: #c7254e;
            background-color: #f9f2f4;
            border-radius: 4px;
        }
        kbd {
            padding: 2px 4px;
            font-size: 90%;
            color: #fff;
            background-color: #333;
            border-radius: 3px;
            -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);
        }
        kbd kbd {
            padding: 0;
            font-size: 100%;
            font-weight: bold;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        pre {
            display: block;
            padding: 9.5px;
            margin: 0 0 10px;
            font-size: 13px;
            line-height: 1.42857143;
            color: #333;
            word-break: break-all;
            word-wrap: break-word;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        pre code {
            padding: 0;
            font-size: inherit;
            color: inherit;
            white-space: pre-wrap;
            background-color: transparent;
            border-radius: 0;
        }
        .pre-scrollable {
            max-height: 340px;
            overflow-y: scroll;
        }
        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        @media (min-width: 768px) {
            .container {
                width: 750px;
            }
        }
        @media (min-width: 992px) {
            .container {
                width: 970px;
            }
        }
        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }
        .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .row {
            margin-right: -15px;
            margin-left: -15px;
        }
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }
        .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
            float: left;
        }
        .col-xs-12 {
            width: 100%;
        }
        .col-xs-11 {
            width: 91.66666667%;
        }
        .col-xs-10 {
            width: 83.33333333%;
        }
        .col-xs-9 {
            width: 75%;
        }
        .col-xs-8 {
            width: 66.66666667%;
        }
        .col-xs-7 {
            width: 58.33333333%;
        }
        .col-xs-6 {
            width: 50%;
        }
        .col-xs-5 {
            width: 41.66666667%;
        }
        .col-xs-4 {
            width: 33.33333333%;
        }
        .col-xs-3 {
            width: 25%;
        }
        .col-xs-2 {
            width: 16.66666667%;
        }
        .col-xs-1 {
            width: 8.33333333%;
        }
        .col-xs-pull-12 {
            right: 100%;
        }
        .col-xs-pull-11 {
            right: 91.66666667%;
        }
        .col-xs-pull-10 {
            right: 83.33333333%;
        }
        .col-xs-pull-9 {
            right: 75%;
        }
        .col-xs-pull-8 {
            right: 66.66666667%;
        }
        .col-xs-pull-7 {
            right: 58.33333333%;
        }
        .col-xs-pull-6 {
            right: 50%;
        }
        .col-xs-pull-5 {
            right: 41.66666667%;
        }
        .col-xs-pull-4 {
            right: 33.33333333%;
        }
        .col-xs-pull-3 {
            right: 25%;
        }
        .col-xs-pull-2 {
            right: 16.66666667%;
        }
        .col-xs-pull-1 {
            right: 8.33333333%;
        }
        .col-xs-pull-0 {
            right: auto;
        }
        .col-xs-push-12 {
            left: 100%;
        }
        .col-xs-push-11 {
            left: 91.66666667%;
        }
        .col-xs-push-10 {
            left: 83.33333333%;
        }
        .col-xs-push-9 {
            left: 75%;
        }
        .col-xs-push-8 {
            left: 66.66666667%;
        }
        .col-xs-push-7 {
            left: 58.33333333%;
        }
        .col-xs-push-6 {
            left: 50%;
        }
        .col-xs-push-5 {
            left: 41.66666667%;
        }
        .col-xs-push-4 {
            left: 33.33333333%;
        }
        .col-xs-push-3 {
            left: 25%;
        }
        .col-xs-push-2 {
            left: 16.66666667%;
        }
        .col-xs-push-1 {
            left: 8.33333333%;
        }
        .col-xs-push-0 {
            left: auto;
        }
        .col-xs-offset-12 {
            margin-left: 100%;
        }
        .col-xs-offset-11 {
            margin-left: 91.66666667%;
        }
        .col-xs-offset-10 {
            margin-left: 83.33333333%;
        }
        .col-xs-offset-9 {
            margin-left: 75%;
        }
        .col-xs-offset-8 {
            margin-left: 66.66666667%;
        }
        .col-xs-offset-7 {
            margin-left: 58.33333333%;
        }
        .col-xs-offset-6 {
            margin-left: 50%;
        }
        .col-xs-offset-5 {
            margin-left: 41.66666667%;
        }
        .col-xs-offset-4 {
            margin-left: 33.33333333%;
        }
        .col-xs-offset-3 {
            margin-left: 25%;
        }
        .col-xs-offset-2 {
            margin-left: 16.66666667%;
        }
        .col-xs-offset-1 {
            margin-left: 8.33333333%;
        }
        .col-xs-offset-0 {
            margin-left: 0;
        }
        @media (min-width: 768px) {
            .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                float: left;
            }
            .col-sm-12 {
                width: 100%;
            }
            .col-sm-11 {
                width: 91.66666667%;
            }
            .col-sm-10 {
                width: 83.33333333%;
            }
            .col-sm-9 {
                width: 75%;
            }
            .col-sm-8 {
                width: 66.66666667%;
            }
            .col-sm-7 {
                width: 58.33333333%;
            }
            .col-sm-6 {
                width: 50%;
            }
            .col-sm-5 {
                width: 41.66666667%;
            }
            .col-sm-4 {
                width: 33.33333333%;
            }
            .col-sm-3 {
                width: 25%;
            }
            .col-sm-2 {
                width: 16.66666667%;
            }
            .col-sm-1 {
                width: 8.33333333%;
            }
            .col-sm-pull-12 {
                right: 100%;
            }
            .col-sm-pull-11 {
                right: 91.66666667%;
            }
            .col-sm-pull-10 {
                right: 83.33333333%;
            }
            .col-sm-pull-9 {
                right: 75%;
            }
            .col-sm-pull-8 {
                right: 66.66666667%;
            }
            .col-sm-pull-7 {
                right: 58.33333333%;
            }
            .col-sm-pull-6 {
                right: 50%;
            }
            .col-sm-pull-5 {
                right: 41.66666667%;
            }
            .col-sm-pull-4 {
                right: 33.33333333%;
            }
            .col-sm-pull-3 {
                right: 25%;
            }
            .col-sm-pull-2 {
                right: 16.66666667%;
            }
            .col-sm-pull-1 {
                right: 8.33333333%;
            }
            .col-sm-pull-0 {
                right: auto;
            }
            .col-sm-push-12 {
                left: 100%;
            }
            .col-sm-push-11 {
                left: 91.66666667%;
            }
            .col-sm-push-10 {
                left: 83.33333333%;
            }
            .col-sm-push-9 {
                left: 75%;
            }
            .col-sm-push-8 {
                left: 66.66666667%;
            }
            .col-sm-push-7 {
                left: 58.33333333%;
            }
            .col-sm-push-6 {
                left: 50%;
            }
            .col-sm-push-5 {
                left: 41.66666667%;
            }
            .col-sm-push-4 {
                left: 33.33333333%;
            }
            .col-sm-push-3 {
                left: 25%;
            }
            .col-sm-push-2 {
                left: 16.66666667%;
            }
            .col-sm-push-1 {
                left: 8.33333333%;
            }
            .col-sm-push-0 {
                left: auto;
            }
            .col-sm-offset-12 {
                margin-left: 100%;
            }
            .col-sm-offset-11 {
                margin-left: 91.66666667%;
            }
            .col-sm-offset-10 {
                margin-left: 83.33333333%;
            }
            .col-sm-offset-9 {
                margin-left: 75%;
            }
            .col-sm-offset-8 {
                margin-left: 66.66666667%;
            }
            .col-sm-offset-7 {
                margin-left: 58.33333333%;
            }
            .col-sm-offset-6 {
                margin-left: 50%;
            }
            .col-sm-offset-5 {
                margin-left: 41.66666667%;
            }
            .col-sm-offset-4 {
                margin-left: 33.33333333%;
            }
            .col-sm-offset-3 {
                margin-left: 25%;
            }
            .col-sm-offset-2 {
                margin-left: 16.66666667%;
            }
            .col-sm-offset-1 {
                margin-left: 8.33333333%;
            }
            .col-sm-offset-0 {
                margin-left: 0;
            }
        }
        @media (min-width: 992px) {
            .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
                float: left;
            }
            .col-md-12 {
                width: 100%;
            }
            .col-md-11 {
                width: 91.66666667%;
            }
            .col-md-10 {
                width: 83.33333333%;
            }
            .col-md-9 {
                width: 75%;
            }
            .col-md-8 {
                width: 66.66666667%;
            }
            .col-md-7 {
                width: 58.33333333%;
            }
            .col-md-6 {
                width: 50%;
            }
            .col-md-5 {
                width: 41.66666667%;
            }
            .col-md-4 {
                width: 33.33333333%;
            }
            .col-md-3 {
                width: 25%;
            }
            .col-md-2 {
                width: 16.66666667%;
            }
            .col-md-1 {
                width: 8.33333333%;
            }
            .col-md-pull-12 {
                right: 100%;
            }
            .col-md-pull-11 {
                right: 91.66666667%;
            }
            .col-md-pull-10 {
                right: 83.33333333%;
            }
            .col-md-pull-9 {
                right: 75%;
            }
            .col-md-pull-8 {
                right: 66.66666667%;
            }
            .col-md-pull-7 {
                right: 58.33333333%;
            }
            .col-md-pull-6 {
                right: 50%;
            }
            .col-md-pull-5 {
                right: 41.66666667%;
            }
            .col-md-pull-4 {
                right: 33.33333333%;
            }
            .col-md-pull-3 {
                right: 25%;
            }
            .col-md-pull-2 {
                right: 16.66666667%;
            }
            .col-md-pull-1 {
                right: 8.33333333%;
            }
            .col-md-pull-0 {
                right: auto;
            }
            .col-md-push-12 {
                left: 100%;
            }
            .col-md-push-11 {
                left: 91.66666667%;
            }
            .col-md-push-10 {
                left: 83.33333333%;
            }
            .col-md-push-9 {
                left: 75%;
            }
            .col-md-push-8 {
                left: 66.66666667%;
            }
            .col-md-push-7 {
                left: 58.33333333%;
            }
            .col-md-push-6 {
                left: 50%;
            }
            .col-md-push-5 {
                left: 41.66666667%;
            }
            .col-md-push-4 {
                left: 33.33333333%;
            }
            .col-md-push-3 {
                left: 25%;
            }
            .col-md-push-2 {
                left: 16.66666667%;
            }
            .col-md-push-1 {
                left: 8.33333333%;
            }
            .col-md-push-0 {
                left: auto;
            }
            .col-md-offset-12 {
                margin-left: 100%;
            }
            .col-md-offset-11 {
                margin-left: 91.66666667%;
            }
            .col-md-offset-10 {
                margin-left: 83.33333333%;
            }
            .col-md-offset-9 {
                margin-left: 75%;
            }
            .col-md-offset-8 {
                margin-left: 66.66666667%;
            }
            .col-md-offset-7 {
                margin-left: 58.33333333%;
            }
            .col-md-offset-6 {
                margin-left: 50%;
            }
            .col-md-offset-5 {
                margin-left: 41.66666667%;
            }
            .col-md-offset-4 {
                margin-left: 33.33333333%;
            }
            .col-md-offset-3 {
                margin-left: 25%;
            }
            .col-md-offset-2 {
                margin-left: 16.66666667%;
            }
            .col-md-offset-1 {
                margin-left: 8.33333333%;
            }
            .col-md-offset-0 {
                margin-left: 0;
            }
        }
        @media (min-width: 1200px) {
            .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
                float: left;
            }
            .col-lg-12 {
                width: 100%;
            }
            .col-lg-11 {
                width: 91.66666667%;
            }
            .col-lg-10 {
                width: 83.33333333%;
            }
            .col-lg-9 {
                width: 75%;
            }
            .col-lg-8 {
                width: 66.66666667%;
            }
            .col-lg-7 {
                width: 58.33333333%;
            }
            .col-lg-6 {
                width: 50%;
            }
            .col-lg-5 {
                width: 41.66666667%;
            }
            .col-lg-4 {
                width: 33.33333333%;
            }
            .col-lg-3 {
                width: 25%;
            }
            .col-lg-2 {
                width: 16.66666667%;
            }
            .col-lg-1 {
                width: 8.33333333%;
            }
            .col-lg-pull-12 {
                right: 100%;
            }
            .col-lg-pull-11 {
                right: 91.66666667%;
            }
            .col-lg-pull-10 {
                right: 83.33333333%;
            }
            .col-lg-pull-9 {
                right: 75%;
            }
            .col-lg-pull-8 {
                right: 66.66666667%;
            }
            .col-lg-pull-7 {
                right: 58.33333333%;
            }
            .col-lg-pull-6 {
                right: 50%;
            }
            .col-lg-pull-5 {
                right: 41.66666667%;
            }
            .col-lg-pull-4 {
                right: 33.33333333%;
            }
            .col-lg-pull-3 {
                right: 25%;
            }
            .col-lg-pull-2 {
                right: 16.66666667%;
            }
            .col-lg-pull-1 {
                right: 8.33333333%;
            }
            .col-lg-pull-0 {
                right: auto;
            }
            .col-lg-push-12 {
                left: 100%;
            }
            .col-lg-push-11 {
                left: 91.66666667%;
            }
            .col-lg-push-10 {
                left: 83.33333333%;
            }
            .col-lg-push-9 {
                left: 75%;
            }
            .col-lg-push-8 {
                left: 66.66666667%;
            }
            .col-lg-push-7 {
                left: 58.33333333%;
            }
            .col-lg-push-6 {
                left: 50%;
            }
            .col-lg-push-5 {
                left: 41.66666667%;
            }
            .col-lg-push-4 {
                left: 33.33333333%;
            }
            .col-lg-push-3 {
                left: 25%;
            }
            .col-lg-push-2 {
                left: 16.66666667%;
            }
            .col-lg-push-1 {
                left: 8.33333333%;
            }
            .col-lg-push-0 {
                left: auto;
            }
            .col-lg-offset-12 {
                margin-left: 100%;
            }
            .col-lg-offset-11 {
                margin-left: 91.66666667%;
            }
            .col-lg-offset-10 {
                margin-left: 83.33333333%;
            }
            .col-lg-offset-9 {
                margin-left: 75%;
            }
            .col-lg-offset-8 {
                margin-left: 66.66666667%;
            }
            .col-lg-offset-7 {
                margin-left: 58.33333333%;
            }
            .col-lg-offset-6 {
                margin-left: 50%;
            }
            .col-lg-offset-5 {
                margin-left: 41.66666667%;
            }
            .col-lg-offset-4 {
                margin-left: 33.33333333%;
            }
            .col-lg-offset-3 {
                margin-left: 25%;
            }
            .col-lg-offset-2 {
                margin-left: 16.66666667%;
            }
            .col-lg-offset-1 {
                margin-left: 8.33333333%;
            }
            .col-lg-offset-0 {
                margin-left: 0;
            }
        }
        table {
            background-color: transparent;
        }
        caption {
            padding-top: 8px;
            padding-bottom: 8px;
            color: #777;
            text-align: left;
        }
        th {
            text-align: left;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
        }
        .table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }
        .table > thead > tr > th {
            vertical-align: bottom;
            border-bottom: 2px solid #ddd;
        }
        .table > caption + thead > tr:first-child > th,
        .table > colgroup + thead > tr:first-child > th,
        .table > thead:first-child > tr:first-child > th,
        .table > caption + thead > tr:first-child > td,
        .table > colgroup + thead > tr:first-child > td,
        .table > thead:first-child > tr:first-child > td {
            border-top: 0;
        }
        .table > tbody + tbody {
            border-top: 2px solid #ddd;
        }
        .table .table {
            background-color: #fff;
        }
        .table-condensed > thead > tr > th,
        .table-condensed > tbody > tr > th,
        .table-condensed > tfoot > tr > th,
        .table-condensed > thead > tr > td,
        .table-condensed > tbody > tr > td,
        .table-condensed > tfoot > tr > td {
            padding: 5px;
        }
        .table-bordered {
            border: 1px solid #ddd;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th,
        .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td,
        .table-bordered > tfoot > tr > td {
            border: 1px solid #ddd;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > thead > tr > td {
            border-bottom-width: 2px;
        }
        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
        .table-hover > tbody > tr:hover {
            background-color: #f5f5f5;
        }
        table col[class*="col-"] {
            position: static;
            display: table-column;
            float: none;
        }
        table td[class*="col-"],
        table th[class*="col-"] {
            position: static;
            display: table-cell;
            float: none;
        }
        .table > thead > tr > td.active,
        .table > tbody > tr > td.active,
        .table > tfoot > tr > td.active,
        .table > thead > tr > th.active,
        .table > tbody > tr > th.active,
        .table > tfoot > tr > th.active,
        .table > thead > tr.active > td,
        .table > tbody > tr.active > td,
        .table > tfoot > tr.active > td,
        .table > thead > tr.active > th,
        .table > tbody > tr.active > th,
        .table > tfoot > tr.active > th {
            background-color: #f5f5f5;
        }
        .table-hover > tbody > tr > td.active:hover,
        .table-hover > tbody > tr > th.active:hover,
        .table-hover > tbody > tr.active:hover > td,
        .table-hover > tbody > tr:hover > .active,
        .table-hover > tbody > tr.active:hover > th {
            background-color: #e8e8e8;
        }
        .table > thead > tr > td.success,
        .table > tbody > tr > td.success,
        .table > tfoot > tr > td.success,
        .table > thead > tr > th.success,
        .table > tbody > tr > th.success,
        .table > tfoot > tr > th.success,
        .table > thead > tr.success > td,
        .table > tbody > tr.success > td,
        .table > tfoot > tr.success > td,
        .table > thead > tr.success > th,
        .table > tbody > tr.success > th,
        .table > tfoot > tr.success > th {
            background-color: #dff0d8;
        }
        .table-hover > tbody > tr > td.success:hover,
        .table-hover > tbody > tr > th.success:hover,
        .table-hover > tbody > tr.success:hover > td,
        .table-hover > tbody > tr:hover > .success,
        .table-hover > tbody > tr.success:hover > th {
            background-color: #d0e9c6;
        }
        .table > thead > tr > td.info,
        .table > tbody > tr > td.info,
        .table > tfoot > tr > td.info,
        .table > thead > tr > th.info,
        .table > tbody > tr > th.info,
        .table > tfoot > tr > th.info,
        .table > thead > tr.info > td,
        .table > tbody > tr.info > td,
        .table > tfoot > tr.info > td,
        .table > thead > tr.info > th,
        .table > tbody > tr.info > th,
        .table > tfoot > tr.info > th {
            background-color: #d9edf7;
        }
        .table-hover > tbody > tr > td.info:hover,
        .table-hover > tbody > tr > th.info:hover,
        .table-hover > tbody > tr.info:hover > td,
        .table-hover > tbody > tr:hover > .info,
        .table-hover > tbody > tr.info:hover > th {
            background-color: #c4e3f3;
        }
        .table > thead > tr > td.warning,
        .table > tbody > tr > td.warning,
        .table > tfoot > tr > td.warning,
        .table > thead > tr > th.warning,
        .table > tbody > tr > th.warning,
        .table > tfoot > tr > th.warning,
        .table > thead > tr.warning > td,
        .table > tbody > tr.warning > td,
        .table > tfoot > tr.warning > td,
        .table > thead > tr.warning > th,
        .table > tbody > tr.warning > th,
        .table > tfoot > tr.warning > th {
            background-color: #fcf8e3;
        }
        .table-hover > tbody > tr > td.warning:hover,
        .table-hover > tbody > tr > th.warning:hover,
        .table-hover > tbody > tr.warning:hover > td,
        .table-hover > tbody > tr:hover > .warning,
        .table-hover > tbody > tr.warning:hover > th {
            background-color: #faf2cc;
        }
        .table > thead > tr > td.danger,
        .table > tbody > tr > td.danger,
        .table > tfoot > tr > td.danger,
        .table > thead > tr > th.danger,
        .table > tbody > tr > th.danger,
        .table > tfoot > tr > th.danger,
        .table > thead > tr.danger > td,
        .table > tbody > tr.danger > td,
        .table > tfoot > tr.danger > td,
        .table > thead > tr.danger > th,
        .table > tbody > tr.danger > th,
        .table > tfoot > tr.danger > th {
            background-color: #f2dede;
        }
        .table-hover > tbody > tr > td.danger:hover,
        .table-hover > tbody > tr > th.danger:hover,
        .table-hover > tbody > tr.danger:hover > td,
        .table-hover > tbody > tr:hover > .danger,
        .table-hover > tbody > tr.danger:hover > th {
            background-color: #ebcccc;
        }
        .table-responsive {
            min-height: .01%;
            overflow-x: auto;
        }
        @media screen and (max-width: 767px) {
            .table-responsive {
                width: 100%;
                margin-bottom: 15px;
                overflow-y: hidden;
                -ms-overflow-style: -ms-autohiding-scrollbar;
                border: 1px solid #ddd;
            }
            .table-responsive > .table {
                margin-bottom: 0;
            }
            .table-responsive > .table > thead > tr > th,
            .table-responsive > .table > tbody > tr > th,
            .table-responsive > .table > tfoot > tr > th,
            .table-responsive > .table > thead > tr > td,
            .table-responsive > .table > tbody > tr > td,
            .table-responsive > .table > tfoot > tr > td {
                white-space: nowrap;
            }
            .table-responsive > .table-bordered {
                border: 0;
            }
            .table-responsive > .table-bordered > thead > tr > th:first-child,
            .table-responsive > .table-bordered > tbody > tr > th:first-child,
            .table-responsive > .table-bordered > tfoot > tr > th:first-child,
            .table-responsive > .table-bordered > thead > tr > td:first-child,
            .table-responsive > .table-bordered > tbody > tr > td:first-child,
            .table-responsive > .table-bordered > tfoot > tr > td:first-child {
                border-left: 0;
            }
            .table-responsive > .table-bordered > thead > tr > th:last-child,
            .table-responsive > .table-bordered > tbody > tr > th:last-child,
            .table-responsive > .table-bordered > tfoot > tr > th:last-child,
            .table-responsive > .table-bordered > thead > tr > td:last-child,
            .table-responsive > .table-bordered > tbody > tr > td:last-child,
            .table-responsive > .table-bordered > tfoot > tr > td:last-child {
                border-right: 0;
            }
            .table-responsive > .table-bordered > tbody > tr:last-child > th,
            .table-responsive > .table-bordered > tfoot > tr:last-child > th,
            .table-responsive > .table-bordered > tbody > tr:last-child > td,
            .table-responsive > .table-bordered > tfoot > tr:last-child > td {
                border-bottom: 0;
            }
        }
        fieldset {
            min-width: 0;
            padding: 0;
            margin: 0;
            border: 0;
        }
        legend {
            display: block;
            width: 100%;
            padding: 0;
            margin-bottom: 20px;
            font-size: 21px;
            line-height: inherit;
            color: #333;
            border: 0;
            border-bottom: 1px solid #e5e5e5;
        }
        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="search"] {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        input[type="radio"],
        input[type="checkbox"] {
            margin: 4px 0 0;
            margin-top: 1px \9;
            line-height: normal;
        }
        input[type="file"] {
            display: block;
        }
        input[type="range"] {
            display: block;
            width: 100%;
        }
        select[multiple],
        select[size] {
            height: auto;
        }
        input[type="file"]:focus,
        input[type="radio"]:focus,
        input[type="checkbox"]:focus {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }
        output {
            display: block;
            padding-top: 7px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
        }
        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }
        .form-control:focus {
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
        }
        .form-control::-moz-placeholder {
            color: #999;
            opacity: 1;
        }
        .form-control:-ms-input-placeholder {
            color: #999;
        }
        .form-control::-webkit-input-placeholder {
            color: #999;
        }
        .form-control[disabled],
        .form-control[readonly],
        fieldset[disabled] .form-control {
            background-color: #eee;
            opacity: 1;
        }
        .form-control[disabled],
        fieldset[disabled] .form-control {
            cursor: not-allowed;
        }
        textarea.form-control {
            height: auto;
        }
        input[type="search"] {
            -webkit-appearance: none;
        }
        @media screen and (-webkit-min-device-pixel-ratio: 0) {
            input[type="date"],
            input[type="time"],
            input[type="datetime-local"],
            input[type="month"] {
                line-height: 34px;
            }
            input[type="date"].input-sm,
            input[type="time"].input-sm,
            input[type="datetime-local"].input-sm,
            input[type="month"].input-sm,
            .input-group-sm input[type="date"],
            .input-group-sm input[type="time"],
            .input-group-sm input[type="datetime-local"],
            .input-group-sm input[type="month"] {
                line-height: 30px;
            }
            input[type="date"].input-lg,
            input[type="time"].input-lg,
            input[type="datetime-local"].input-lg,
            input[type="month"].input-lg,
            .input-group-lg input[type="date"],
            .input-group-lg input[type="time"],
            .input-group-lg input[type="datetime-local"],
            .input-group-lg input[type="month"] {
                line-height: 46px;
            }
        }
        .form-group {
            margin-bottom: 15px;
        }
        .radio,
        .checkbox {
            position: relative;
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .radio label,
        .checkbox label {
            min-height: 20px;
            padding-left: 20px;
            margin-bottom: 0;
            font-weight: normal;
            cursor: pointer;
        }
        .radio input[type="radio"],
        .radio-inline input[type="radio"],
        .checkbox input[type="checkbox"],
        .checkbox-inline input[type="checkbox"] {
            position: absolute;
            margin-top: 4px \9;
            margin-left: -20px;
        }
        .radio + .radio,
        .checkbox + .checkbox {
            margin-top: -5px;
        }
        .radio-inline,
        .checkbox-inline {
            position: relative;
            display: inline-block;
            padding-left: 20px;
            margin-bottom: 0;
            font-weight: normal;
            vertical-align: middle;
            cursor: pointer;
        }
        .radio-inline + .radio-inline,
        .checkbox-inline + .checkbox-inline {
            margin-top: 0;
            margin-left: 10px;
        }
        input[type="radio"][disabled],
        input[type="checkbox"][disabled],
        input[type="radio"].disabled,
        input[type="checkbox"].disabled,
        fieldset[disabled] input[type="radio"],
        fieldset[disabled] input[type="checkbox"] {
            cursor: not-allowed;
        }
        .radio-inline.disabled,
        .checkbox-inline.disabled,
        fieldset[disabled] .radio-inline,
        fieldset[disabled] .checkbox-inline {
            cursor: not-allowed;
        }
        .radio.disabled label,
        .checkbox.disabled label,
        fieldset[disabled] .radio label,
        fieldset[disabled] .checkbox label {
            cursor: not-allowed;
        }
        .form-control-static {
            min-height: 34px;
            padding-top: 7px;
            padding-bottom: 7px;
            margin-bottom: 0;
        }
        .form-control-static.input-lg,
        .form-control-static.input-sm {
            padding-right: 0;
            padding-left: 0;
        }
        .input-sm {
            height: 30px;
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
        select.input-sm {
            height: 30px;
            line-height: 30px;
        }
        textarea.input-sm,
        select[multiple].input-sm {
            height: auto;
        }
        .form-group-sm .form-control {
            height: 30px;
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
        select.form-group-sm .form-control {
            height: 30px;
            line-height: 30px;
        }
        textarea.form-group-sm .form-control,
        select[multiple].form-group-sm .form-control {
            height: auto;
        }
        .form-group-sm .form-control-static {
            height: 30px;
            min-height: 32px;
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
        }
        .input-lg {
            height: 46px;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
        }
        select.input-lg {
            height: 46px;
            line-height: 46px;
        }
        textarea.input-lg,
        select[multiple].input-lg {
            height: auto;
        }
        .form-group-lg .form-control {
            height: 46px;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
        }
        select.form-group-lg .form-control {
            height: 46px;
            line-height: 46px;
        }
        textarea.form-group-lg .form-control,
        select[multiple].form-group-lg .form-control {
            height: auto;
        }
        .form-group-lg .form-control-static {
            height: 46px;
            min-height: 38px;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
        }
        .has-feedback {
            position: relative;
        }
        .has-feedback .form-control {
            padding-right: 42.5px;
        }
        .form-control-feedback {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 2;
            display: block;
            width: 34px;
            height: 34px;
            line-height: 34px;
            text-align: center;
            pointer-events: none;
        }
        .input-lg + .form-control-feedback {
            width: 46px;
            height: 46px;
            line-height: 46px;
        }
        .input-sm + .form-control-feedback {
            width: 30px;
            height: 30px;
            line-height: 30px;
        }
        .has-success .help-block,
        .has-success .control-label,
        .has-success .radio,
        .has-success .checkbox,
        .has-success .radio-inline,
        .has-success .checkbox-inline,
        .has-success.radio label,
        .has-success.checkbox label,
        .has-success.radio-inline label,
        .has-success.checkbox-inline label {
            color: #3c763d;
        }
        .has-success .form-control {
            border-color: #3c763d;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }
        .has-success .form-control:focus {
            border-color: #2b542c;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;
        }
        .has-success .input-group-addon {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #3c763d;
        }
        .has-success .form-control-feedback {
            color: #3c763d;
        }
        .has-warning .help-block,
        .has-warning .control-label,
        .has-warning .radio,
        .has-warning .checkbox,
        .has-warning .radio-inline,
        .has-warning .checkbox-inline,
        .has-warning.radio label,
        .has-warning.checkbox label,
        .has-warning.radio-inline label,
        .has-warning.checkbox-inline label {
            color: #8a6d3b;
        }
        .has-warning .form-control {
            border-color: #8a6d3b;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }
        .has-warning .form-control:focus {
            border-color: #66512c;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;
        }
        .has-warning .input-group-addon {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #8a6d3b;
        }
        .has-warning .form-control-feedback {
            color: #8a6d3b;
        }
        .has-error .help-block,
        .has-error .control-label,
        .has-error .radio,
        .has-error .checkbox,
        .has-error .radio-inline,
        .has-error .checkbox-inline,
        .has-error.radio label,
        .has-error.checkbox label,
        .has-error.radio-inline label,
        .has-error.checkbox-inline label {
            color: #a94442;
        }
        .has-error .form-control {
            border-color: #a94442;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }
        .has-error .form-control:focus {
            border-color: #843534;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
        }
        .has-error .input-group-addon {
            color: #a94442;
            background-color: #f2dede;
            border-color: #a94442;
        }
        .has-error .form-control-feedback {
            color: #a94442;
        }
        .has-feedback label ~ .form-control-feedback {
            top: 25px;
        }
        .has-feedback label.sr-only ~ .form-control-feedback {
            top: 0;
        }
        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
            color: #737373;
        }
        @media (min-width: 768px) {
            .form-inline .form-group {
                display: inline-block;
                margin-bottom: 0;
                vertical-align: middle;
            }
            .form-inline .form-control {
                display: inline-block;
                width: auto;
                vertical-align: middle;
            }
            .form-inline .form-control-static {
                display: inline-block;
            }
            .form-inline .input-group {
                display: inline-table;
                vertical-align: middle;
            }
            .form-inline .input-group .input-group-addon,
            .form-inline .input-group .input-group-btn,
            .form-inline .input-group .form-control {
                width: auto;
            }
            .form-inline .input-group > .form-control {
                width: 100%;
            }
            .form-inline .control-label {
                margin-bottom: 0;
                vertical-align: middle;
            }
            .form-inline .radio,
            .form-inline .checkbox {
                display: inline-block;
                margin-top: 0;
                margin-bottom: 0;
                vertical-align: middle;
            }
            .form-inline .radio label,
            .form-inline .checkbox label {
                padding-left: 0;
            }
            .form-inline .radio input[type="radio"],
            .form-inline .checkbox input[type="checkbox"] {
                position: relative;
                margin-left: 0;
            }
            .form-inline .has-feedback .form-control-feedback {
                top: 0;
            }
        }
        .form-horizontal .radio,
        .form-horizontal .checkbox,
        .form-horizontal .radio-inline,
        .form-horizontal .checkbox-inline {
            padding-top: 7px;
            margin-top: 0;
            margin-bottom: 0;
        }
        .form-horizontal .radio,
        .form-horizontal .checkbox {
            min-height: 27px;
        }
        .form-horizontal .form-group {
            margin-right: -15px;
            margin-left: -15px;
        }
        @media (min-width: 768px) {
            .form-horizontal .control-label {
                padding-top: 7px;
                margin-bottom: 0;
                text-align: right;
            }
        }
        .form-horizontal .has-feedback .form-control-feedback {
            right: 15px;
        }
        @media (min-width: 768px) {
            .form-horizontal .form-group-lg .control-label {
                padding-top: 14.333333px;
            }
        }
        @media (min-width: 768px) {
            .form-horizontal .form-group-sm .control-label {
                padding-top: 6px;
            }
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .btn:focus,
        .btn:active:focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn.active.focus {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }
        .btn:hover,
        .btn:focus,
        .btn.focus {
            color: #333;
            text-decoration: none;
        }
        .btn:active,
        .btn.active {
            background-image: none;
            outline: 0;
            -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        }
        .btn.disabled,
        .btn[disabled],
        fieldset[disabled] .btn {
            pointer-events: none;
            cursor: not-allowed;
            filter: alpha(opacity=65);
            -webkit-box-shadow: none;
            box-shadow: none;
            opacity: .65;
        }
        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
        .btn-default:hover,
        .btn-default:focus,
        .btn-default.focus,
        .btn-default:active,
        .btn-default.active,
        .open > .dropdown-toggle.btn-default {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
        }
        .btn-default:active,
        .btn-default.active,
        .open > .dropdown-toggle.btn-default {
            background-image: none;
        }
        .btn-default.disabled,
        .btn-default[disabled],
        fieldset[disabled] .btn-default,
        .btn-default.disabled:hover,
        .btn-default[disabled]:hover,
        fieldset[disabled] .btn-default:hover,
        .btn-default.disabled:focus,
        .btn-default[disabled]:focus,
        fieldset[disabled] .btn-default:focus,
        .btn-default.disabled.focus,
        .btn-default[disabled].focus,
        fieldset[disabled] .btn-default.focus,
        .btn-default.disabled:active,
        .btn-default[disabled]:active,
        fieldset[disabled] .btn-default:active,
        .btn-default.disabled.active,
        .btn-default[disabled].active,
        fieldset[disabled] .btn-default.active {
            background-color: #fff;
            border-color: #ccc;
        }
        .btn-default .badge {
            color: #fff;
            background-color: #333;
        }
        .btn-primary {
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
        }
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary.focus,
        .btn-primary:active,
        .btn-primary.active,
        .open > .dropdown-toggle.btn-primary {
            color: #fff;
            background-color: #286090;
            border-color: #204d74;
        }
        .btn-primary:active,
        .btn-primary.active,
        .open > .dropdown-toggle.btn-primary {
            background-image: none;
        }
        .btn-primary.disabled,
        .btn-primary[disabled],
        fieldset[disabled] .btn-primary,
        .btn-primary.disabled:hover,
        .btn-primary[disabled]:hover,
        fieldset[disabled] .btn-primary:hover,
        .btn-primary.disabled:focus,
        .btn-primary[disabled]:focus,
        fieldset[disabled] .btn-primary:focus,
        .btn-primary.disabled.focus,
        .btn-primary[disabled].focus,
        fieldset[disabled] .btn-primary.focus,
        .btn-primary.disabled:active,
        .btn-primary[disabled]:active,
        fieldset[disabled] .btn-primary:active,
        .btn-primary.disabled.active,
        .btn-primary[disabled].active,
        fieldset[disabled] .btn-primary.active {
            background-color: #337ab7;
            border-color: #2e6da4;
        }
        .btn-primary .badge {
            color: #337ab7;
            background-color: #fff;
        }
        .btn-success {
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
        }
        .btn-success:hover,
        .btn-success:focus,
        .btn-success.focus,
        .btn-success:active,
        .btn-success.active,
        .open > .dropdown-toggle.btn-success {
            color: #fff;
            background-color: #449d44;
            border-color: #398439;
        }
        .btn-success:active,
        .btn-success.active,
        .open > .dropdown-toggle.btn-success {
            background-image: none;
        }
        .btn-success.disabled,
        .btn-success[disabled],
        fieldset[disabled] .btn-success,
        .btn-success.disabled:hover,
        .btn-success[disabled]:hover,
        fieldset[disabled] .btn-success:hover,
        .btn-success.disabled:focus,
        .btn-success[disabled]:focus,
        fieldset[disabled] .btn-success:focus,
        .btn-success.disabled.focus,
        .btn-success[disabled].focus,
        fieldset[disabled] .btn-success.focus,
        .btn-success.disabled:active,
        .btn-success[disabled]:active,
        fieldset[disabled] .btn-success:active,
        .btn-success.disabled.active,
        .btn-success[disabled].active,
        fieldset[disabled] .btn-success.active {
            background-color: #5cb85c;
            border-color: #4cae4c;
        }
        .btn-success .badge {
            color: #5cb85c;
            background-color: #fff;
        }
        .btn-info {
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
        }
        .btn-info:hover,
        .btn-info:focus,
        .btn-info.focus,
        .btn-info:active,
        .btn-info.active,
        .open > .dropdown-toggle.btn-info {
            color: #fff;
            background-color: #31b0d5;
            border-color: #269abc;
        }
        .btn-info:active,
        .btn-info.active,
        .open > .dropdown-toggle.btn-info {
            background-image: none;
        }
        .btn-info.disabled,
        .btn-info[disabled],
        fieldset[disabled] .btn-info,
        .btn-info.disabled:hover,
        .btn-info[disabled]:hover,
        fieldset[disabled] .btn-info:hover,
        .btn-info.disabled:focus,
        .btn-info[disabled]:focus,
        fieldset[disabled] .btn-info:focus,
        .btn-info.disabled.focus,
        .btn-info[disabled].focus,
        fieldset[disabled] .btn-info.focus,
        .btn-info.disabled:active,
        .btn-info[disabled]:active,
        fieldset[disabled] .btn-info:active,
        .btn-info.disabled.active,
        .btn-info[disabled].active,
        fieldset[disabled] .btn-info.active {
            background-color: #5bc0de;
            border-color: #46b8da;
        }
        .btn-info .badge {
            color: #5bc0de;
            background-color: #fff;
        }
        .btn-warning {
            color: #fff;
            background-color: #f0ad4e;
            border-color: #eea236;
        }
        .btn-warning:hover,
        .btn-warning:focus,
        .btn-warning.focus,
        .btn-warning:active,
        .btn-warning.active,
        .open > .dropdown-toggle.btn-warning {
            color: #fff;
            background-color: #ec971f;
            border-color: #d58512;
        }
        .btn-warning:active,
        .btn-warning.active,
        .open > .dropdown-toggle.btn-warning {
            background-image: none;
        }
        .btn-warning.disabled,
        .btn-warning[disabled],
        fieldset[disabled] .btn-warning,
        .btn-warning.disabled:hover,
        .btn-warning[disabled]:hover,
        fieldset[disabled] .btn-warning:hover,
        .btn-warning.disabled:focus,
        .btn-warning[disabled]:focus,
        fieldset[disabled] .btn-warning:focus,
        .btn-warning.disabled.focus,
        .btn-warning[disabled].focus,
        fieldset[disabled] .btn-warning.focus,
        .btn-warning.disabled:active,
        .btn-warning[disabled]:active,
        fieldset[disabled] .btn-warning:active,
        .btn-warning.disabled.active,
        .btn-warning[disabled].active,
        fieldset[disabled] .btn-warning.active {
            background-color: #f0ad4e;
            border-color: #eea236;
        }
        .btn-warning .badge {
            color: #f0ad4e;
            background-color: #fff;
        }
        .btn-danger {
            color: #fff;
            background-color: #d9534f;
            border-color: #d43f3a;
        }
        .btn-danger:hover,
        .btn-danger:focus,
        .btn-danger.focus,
        .btn-danger:active,
        .btn-danger.active,
        .open > .dropdown-toggle.btn-danger {
            color: #fff;
            background-color: #c9302c;
            border-color: #ac2925;
        }
        .btn-danger:active,
        .btn-danger.active,
        .open > .dropdown-toggle.btn-danger {
            background-image: none;
        }
        .btn-danger.disabled,
        .btn-danger[disabled],
        fieldset[disabled] .btn-danger,
        .btn-danger.disabled:hover,
        .btn-danger[disabled]:hover,
        fieldset[disabled] .btn-danger:hover,
        .btn-danger.disabled:focus,
        .btn-danger[disabled]:focus,
        fieldset[disabled] .btn-danger:focus,
        .btn-danger.disabled.focus,
        .btn-danger[disabled].focus,
        fieldset[disabled] .btn-danger.focus,
        .btn-danger.disabled:active,
        .btn-danger[disabled]:active,
        fieldset[disabled] .btn-danger:active,
        .btn-danger.disabled.active,
        .btn-danger[disabled].active,
        fieldset[disabled] .btn-danger.active {
            background-color: #d9534f;
            border-color: #d43f3a;
        }
        .btn-danger .badge {
            color: #d9534f;
            background-color: #fff;
        }
        .btn-link {
            font-weight: normal;
            color: #337ab7;
            border-radius: 0;
        }
        .btn-link,
        .btn-link:active,
        .btn-link.active,
        .btn-link[disabled],
        fieldset[disabled] .btn-link {
            background-color: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .btn-link,
        .btn-link:hover,
        .btn-link:focus,
        .btn-link:active {
            border-color: transparent;
        }
        .btn-link:hover,
        .btn-link:focus {
            color: #23527c;
            text-decoration: underline;
            background-color: transparent;
        }
        .btn-link[disabled]:hover,
        fieldset[disabled] .btn-link:hover,
        .btn-link[disabled]:focus,
        fieldset[disabled] .btn-link:focus {
            color: #777;
            text-decoration: none;
        }
        .btn-lg,
        .btn-group-lg > .btn {
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
        }
        .btn-sm,
        .btn-group-sm > .btn {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
        .btn-xs,
        .btn-group-xs > .btn {
            padding: 1px 5px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
        .btn-block {
            display: block;
            width: 100%;
        }
        .btn-block + .btn-block {
            margin-top: 5px;
        }
        input[type="submit"].btn-block,
        input[type="reset"].btn-block,
        input[type="button"].btn-block {
            width: 100%;
        }
        .fade {
            opacity: 0;
            -webkit-transition: opacity .15s linear;
            -o-transition: opacity .15s linear;
            transition: opacity .15s linear;
        }
        .fade.in {
            opacity: 1;
        }
        .collapse {
            display: none;
        }
        .collapse.in {
            display: block;
        }
        tr.collapse.in {
            display: table-row;
        }
        tbody.collapse.in {
            display: table-row-group;
        }
        .collapsing {
            position: relative;
            height: 0;
            overflow: hidden;
            -webkit-transition-timing-function: ease;
            -o-transition-timing-function: ease;
            transition-timing-function: ease;
            -webkit-transition-duration: .35s;
            -o-transition-duration: .35s;
            transition-duration: .35s;
            -webkit-transition-property: height, visibility;
            -o-transition-property: height, visibility;
            transition-property: height, visibility;
        }
        .caret {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 2px;
            vertical-align: middle;
            border-top: 4px dashed;
            border-right: 4px solid transparent;
            border-left: 4px solid transparent;
        }
        .dropup,
        .dropdown {
            position: relative;
        }
        .dropdown-toggle:focus {
            outline: 0;
        }
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            font-size: 14px;
            text-align: left;
            list-style: none;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        }
        .dropdown-menu.pull-right {
            right: 0;
            left: auto;
        }
        .dropdown-menu .divider {
            height: 1px;
            margin: 9px 0;
            overflow: hidden;
            background-color: #e5e5e5;
        }
        .dropdown-menu > li > a {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: normal;
            line-height: 1.42857143;
            color: #333;
            white-space: nowrap;
        }
        .dropdown-menu > li > a:hover,
        .dropdown-menu > li > a:focus {
            color: #262626;
            text-decoration: none;
            background-color: #f5f5f5;
        }
        .dropdown-menu > .active > a,
        .dropdown-menu > .active > a:hover,
        .dropdown-menu > .active > a:focus {
            color: #fff;
            text-decoration: none;
            background-color: #337ab7;
            outline: 0;
        }
        .dropdown-menu > .disabled > a,
        .dropdown-menu > .disabled > a:hover,
        .dropdown-menu > .disabled > a:focus {
            color: #777;
        }
        .dropdown-menu > .disabled > a:hover,
        .dropdown-menu > .disabled > a:focus {
            text-decoration: none;
            cursor: not-allowed;
            background-color: transparent;
            background-image: none;
            filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
        }
        .open > .dropdown-menu {
            display: block;
        }
        .open > a {
            outline: 0;
        }
        .dropdown-menu-right {
            right: 0;
            left: auto;
        }
        .dropdown-menu-left {
            right: auto;
            left: 0;
        }
        .dropdown-header {
            display: block;
            padding: 3px 20px;
            font-size: 12px;
            line-height: 1.42857143;
            color: #777;
            white-space: nowrap;
        }
        .dropdown-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 990;
        }
        .pull-right > .dropdown-menu {
            right: 0;
            left: auto;
        }
        .dropup .caret,
        .navbar-fixed-bottom .dropdown .caret {
            content: "";
            border-top: 0;
            border-bottom: 4px solid;
        }
        .dropup .dropdown-menu,
        .navbar-fixed-bottom .dropdown .dropdown-menu {
            top: auto;
            bottom: 100%;
            margin-bottom: 2px;
        }
        @media (min-width: 768px) {
            .navbar-right .dropdown-menu {
                right: 0;
                left: auto;
            }
            .navbar-right .dropdown-menu-left {
                right: auto;
                left: 0;
            }
        }
        .btn-group,
        .btn-group-vertical {
            position: relative;
            display: inline-block;
            vertical-align: middle;
        }
        .btn-group > .btn,
        .btn-group-vertical > .btn {
            position: relative;
            float: left;
        }
        .btn-group > .btn:hover,
        .btn-group-vertical > .btn:hover,
        .btn-group > .btn:focus,
        .btn-group-vertical > .btn:focus,
        .btn-group > .btn:active,
        .btn-group-vertical > .btn:active,
        .btn-group > .btn.active,
        .btn-group-vertical > .btn.active {
            z-index: 2;
        }
        .btn-group .btn + .btn,
        .btn-group .btn + .btn-group,
        .btn-group .btn-group + .btn,
        .btn-group .btn-group + .btn-group {
            margin-left: -1px;
        }
        .btn-toolbar {
            margin-left: -5px;
        }
        .btn-toolbar .btn-group,
        .btn-toolbar .input-group {
            float: left;
        }
        .btn-toolbar > .btn,
        .btn-toolbar > .btn-group,
        .btn-toolbar > .input-group {
            margin-left: 5px;
        }
        .btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
            border-radius: 0;
        }
        .btn-group > .btn:first-child {
            margin-left: 0;
        }
        .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .btn-group > .btn:last-child:not(:first-child),
        .btn-group > .dropdown-toggle:not(:first-child) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .btn-group > .btn-group {
            float: left;
        }
        .btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
            border-radius: 0;
        }
        .btn-group > .btn-group:first-child:not(:last-child) > .btn:last-child,
        .btn-group > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .btn-group > .btn-group:last-child:not(:first-child) > .btn:first-child {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .btn-group .dropdown-toggle:active,
        .btn-group.open .dropdown-toggle {
            outline: 0;
        }
        .btn-group > .btn + .dropdown-toggle {
            padding-right: 8px;
            padding-left: 8px;
        }
        .btn-group > .btn-lg + .dropdown-toggle {
            padding-right: 12px;
            padding-left: 12px;
        }
        .btn-group.open .dropdown-toggle {
            -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        }
        .btn-group.open .dropdown-toggle.btn-link {
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .btn .caret {
            margin-left: 0;
        }
        .btn-lg .caret {
            border-width: 5px 5px 0;
            border-bottom-width: 0;
        }
        .dropup .btn-lg .caret {
            border-width: 0 5px 5px;
        }
        .btn-group-vertical > .btn,
        .btn-group-vertical > .btn-group,
        .btn-group-vertical > .btn-group > .btn {
            display: block;
            float: none;
            width: 100%;
            max-width: 100%;
        }
        .btn-group-vertical > .btn-group > .btn {
            float: none;
        }
        .btn-group-vertical > .btn + .btn,
        .btn-group-vertical > .btn + .btn-group,
        .btn-group-vertical > .btn-group + .btn,
        .btn-group-vertical > .btn-group + .btn-group {
            margin-top: -1px;
            margin-left: 0;
        }
        .btn-group-vertical > .btn:not(:first-child):not(:last-child) {
            border-radius: 0;
        }
        .btn-group-vertical > .btn:first-child:not(:last-child) {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .btn-group-vertical > .btn:last-child:not(:first-child) {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: 4px;
        }
        .btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {
            border-radius: 0;
        }
        .btn-group-vertical > .btn-group:first-child:not(:last-child) > .btn:last-child,
        .btn-group-vertical > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .btn-group-vertical > .btn-group:last-child:not(:first-child) > .btn:first-child {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .btn-group-justified {
            display: table;
            width: 100%;
            table-layout: fixed;
            border-collapse: separate;
        }
        .btn-group-justified > .btn,
        .btn-group-justified > .btn-group {
            display: table-cell;
            float: none;
            width: 1%;
        }
        .btn-group-justified > .btn-group .btn {
            width: 100%;
        }
        .btn-group-justified > .btn-group .dropdown-menu {
            left: auto;
        }
        [data-toggle="buttons"] > .btn input[type="radio"],
        [data-toggle="buttons"] > .btn-group > .btn input[type="radio"],
        [data-toggle="buttons"] > .btn input[type="checkbox"],
        [data-toggle="buttons"] > .btn-group > .btn input[type="checkbox"] {
            position: absolute;
            clip: rect(0, 0, 0, 0);
            pointer-events: none;
        }
        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
        }
        .input-group[class*="col-"] {
            float: none;
            padding-right: 0;
            padding-left: 0;
        }
        .input-group .form-control {
            position: relative;
            z-index: 2;
            float: left;
            width: 100%;
            margin-bottom: 0;
        }
        .input-group-lg > .form-control,
        .input-group-lg > .input-group-addon,
        .input-group-lg > .input-group-btn > .btn {
            height: 46px;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
        }
        select.input-group-lg > .form-control,
        select.input-group-lg > .input-group-addon,
        select.input-group-lg > .input-group-btn > .btn {
            height: 46px;
            line-height: 46px;
        }
        textarea.input-group-lg > .form-control,
        textarea.input-group-lg > .input-group-addon,
        textarea.input-group-lg > .input-group-btn > .btn,
        select[multiple].input-group-lg > .form-control,
        select[multiple].input-group-lg > .input-group-addon,
        select[multiple].input-group-lg > .input-group-btn > .btn {
            height: auto;
        }
        .input-group-sm > .form-control,
        .input-group-sm > .input-group-addon,
        .input-group-sm > .input-group-btn > .btn {
            height: 30px;
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
        select.input-group-sm > .form-control,
        select.input-group-sm > .input-group-addon,
        select.input-group-sm > .input-group-btn > .btn {
            height: 30px;
            line-height: 30px;
        }
        textarea.input-group-sm > .form-control,
        textarea.input-group-sm > .input-group-addon,
        textarea.input-group-sm > .input-group-btn > .btn,
        select[multiple].input-group-sm > .form-control,
        select[multiple].input-group-sm > .input-group-addon,
        select[multiple].input-group-sm > .input-group-btn > .btn {
            height: auto;
        }
        .input-group-addon,
        .input-group-btn,
        .input-group .form-control {
            display: table-cell;
        }
        .input-group-addon:not(:first-child):not(:last-child),
        .input-group-btn:not(:first-child):not(:last-child),
        .input-group .form-control:not(:first-child):not(:last-child) {
            border-radius: 0;
        }
        .input-group-addon,
        .input-group-btn {
            width: 1%;
            white-space: nowrap;
            vertical-align: middle;
        }
        .input-group-addon {
            padding: 6px 12px;
            font-size: 14px;
            font-weight: normal;
            line-height: 1;
            color: #555;
            text-align: center;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .input-group-addon.input-sm {
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 3px;
        }
        .input-group-addon.input-lg {
            padding: 10px 16px;
            font-size: 18px;
            border-radius: 6px;
        }
        .input-group-addon input[type="radio"],
        .input-group-addon input[type="checkbox"] {
            margin-top: 0;
        }
        .input-group .form-control:first-child,
        .input-group-addon:first-child,
        .input-group-btn:first-child > .btn,
        .input-group-btn:first-child > .btn-group > .btn,
        .input-group-btn:first-child > .dropdown-toggle,
        .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle),
        .input-group-btn:last-child > .btn-group:not(:last-child) > .btn {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .input-group-addon:first-child {
            border-right: 0;
        }
        .input-group .form-control:last-child,
        .input-group-addon:last-child,
        .input-group-btn:last-child > .btn,
        .input-group-btn:last-child > .btn-group > .btn,
        .input-group-btn:last-child > .dropdown-toggle,
        .input-group-btn:first-child > .btn:not(:first-child),
        .input-group-btn:first-child > .btn-group:not(:first-child) > .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .input-group-addon:last-child {
            border-left: 0;
        }
        .input-group-btn {
            position: relative;
            font-size: 0;
            white-space: nowrap;
        }
        .input-group-btn > .btn {
            position: relative;
        }
        .input-group-btn > .btn + .btn {
            margin-left: -1px;
        }
        .input-group-btn > .btn:hover,
        .input-group-btn > .btn:focus,
        .input-group-btn > .btn:active {
            z-index: 2;
        }
        .input-group-btn:first-child > .btn,
        .input-group-btn:first-child > .btn-group {
            margin-right: -1px;
        }
        .input-group-btn:last-child > .btn,
        .input-group-btn:last-child > .btn-group {
            margin-left: -1px;
        }
        .nav {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }
        .nav > li {
            position: relative;
            display: block;
        }
        .nav > li > a {
            position: relative;
            display: block;
            padding: 10px 15px;
        }
        .nav > li > a:hover,
        .nav > li > a:focus {
            text-decoration: none;
            background-color: #eee;
        }
        .nav > li.disabled > a {
            color: #777;
        }
        .nav > li.disabled > a:hover,
        .nav > li.disabled > a:focus {
            color: #777;
            text-decoration: none;
            cursor: not-allowed;
            background-color: transparent;
        }
        .nav .open > a,
        .nav .open > a:hover,
        .nav .open > a:focus {
            background-color: #eee;
            border-color: #337ab7;
        }
        .nav .nav-divider {
            height: 1px;
            margin: 9px 0;
            overflow: hidden;
            background-color: #e5e5e5;
        }
        .nav > li > a > img {
            max-width: none;
        }
        .nav-tabs {
            border-bottom: 1px solid #ddd;
        }
        .nav-tabs > li {
            float: left;
            margin-bottom: -1px;
        }
        .nav-tabs > li > a {
            margin-right: 2px;
            line-height: 1.42857143;
            border: 1px solid transparent;
            border-radius: 4px 4px 0 0;
        }
        .nav-tabs > li > a:hover {
            border-color: #eee #eee #ddd;
        }
        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus {
            color: #555;
            cursor: default;
            background-color: #fff;
            border: 1px solid #ddd;
            border-bottom-color: transparent;
        }
        .nav-tabs.nav-justified {
            width: 100%;
            border-bottom: 0;
        }
        .nav-tabs.nav-justified > li {
            float: none;
        }
        .nav-tabs.nav-justified > li > a {
            margin-bottom: 5px;
            text-align: center;
        }
        .nav-tabs.nav-justified > .dropdown .dropdown-menu {
            top: auto;
            left: auto;
        }
        @media (min-width: 768px) {
            .nav-tabs.nav-justified > li {
                display: table-cell;
                width: 1%;
            }
            .nav-tabs.nav-justified > li > a {
                margin-bottom: 0;
            }
        }
        .nav-tabs.nav-justified > li > a {
            margin-right: 0;
            border-radius: 4px;
        }
        .nav-tabs.nav-justified > .active > a,
        .nav-tabs.nav-justified > .active > a:hover,
        .nav-tabs.nav-justified > .active > a:focus {
            border: 1px solid #ddd;
        }
        @media (min-width: 768px) {
            .nav-tabs.nav-justified > li > a {
                border-bottom: 1px solid #ddd;
                border-radius: 4px 4px 0 0;
            }
            .nav-tabs.nav-justified > .active > a,
            .nav-tabs.nav-justified > .active > a:hover,
            .nav-tabs.nav-justified > .active > a:focus {
                border-bottom-color: #fff;
            }
        }
        .nav-pills > li {
            float: left;
        }
        .nav-pills > li > a {
            border-radius: 4px;
        }
        .nav-pills > li + li {
            margin-left: 2px;
        }
        .nav-pills > li.active > a,
        .nav-pills > li.active > a:hover,
        .nav-pills > li.active > a:focus {
            color: #fff;
            background-color: #337ab7;
        }
        .nav-stacked > li {
            float: none;
        }
        .nav-stacked > li + li {
            margin-top: 2px;
            margin-left: 0;
        }
        .nav-justified {
            width: 100%;
        }
        .nav-justified > li {
            float: none;
        }
        .nav-justified > li > a {
            margin-bottom: 5px;
            text-align: center;
        }
        .nav-justified > .dropdown .dropdown-menu {
            top: auto;
            left: auto;
        }
        @media (min-width: 768px) {
            .nav-justified > li {
                display: table-cell;
                width: 1%;
            }
            .nav-justified > li > a {
                margin-bottom: 0;
            }
        }
        .nav-tabs-justified {
            border-bottom: 0;
        }
        .nav-tabs-justified > li > a {
            margin-right: 0;
            border-radius: 4px;
        }
        .nav-tabs-justified > .active > a,
        .nav-tabs-justified > .active > a:hover,
        .nav-tabs-justified > .active > a:focus {
            border: 1px solid #ddd;
        }
        @media (min-width: 768px) {
            .nav-tabs-justified > li > a {
                border-bottom: 1px solid #ddd;
                border-radius: 4px 4px 0 0;
            }
            .nav-tabs-justified > .active > a,
            .nav-tabs-justified > .active > a:hover,
            .nav-tabs-justified > .active > a:focus {
                border-bottom-color: #fff;
            }
        }
        .tab-content > .tab-pane {
            display: none;
        }
        .tab-content > .active {
            display: block;
        }
        .nav-tabs .dropdown-menu {
            margin-top: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .navbar {
            position: relative;
            min-height: 50px;
            margin-bottom: 20px;
            border: 1px solid transparent;
        }
        @media (min-width: 768px) {
            .navbar {
                border-radius: 4px;
            }
        }
        @media (min-width: 768px) {
            .navbar-header {
                float: left;
            }
        }
        .navbar-collapse {
            padding-right: 15px;
            padding-left: 15px;
            overflow-x: visible;
            -webkit-overflow-scrolling: touch;
            border-top: 1px solid transparent;
            -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);
        }
        .navbar-collapse.in {
            overflow-y: auto;
        }
        @media (min-width: 768px) {
            .navbar-collapse {
                width: auto;
                border-top: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            .navbar-collapse.collapse {
                display: block !important;
                height: auto !important;
                padding-bottom: 0;
                overflow: visible !important;
            }
            .navbar-collapse.in {
                overflow-y: visible;
            }
            .navbar-fixed-top .navbar-collapse,
            .navbar-static-top .navbar-collapse,
            .navbar-fixed-bottom .navbar-collapse {
                padding-right: 0;
                padding-left: 0;
            }
        }
        .navbar-fixed-top .navbar-collapse,
        .navbar-fixed-bottom .navbar-collapse {
            max-height: 340px;
        }
        @media (max-device-width: 480px) and (orientation: landscape) {
            .navbar-fixed-top .navbar-collapse,
            .navbar-fixed-bottom .navbar-collapse {
                max-height: 200px;
            }
        }
        .container > .navbar-header,
        .container-fluid > .navbar-header,
        .container > .navbar-collapse,
        .container-fluid > .navbar-collapse {
            margin-right: -15px;
            margin-left: -15px;
        }
        @media (min-width: 768px) {
            .container > .navbar-header,
            .container-fluid > .navbar-header,
            .container > .navbar-collapse,
            .container-fluid > .navbar-collapse {
                margin-right: 0;
                margin-left: 0;
            }
        }
        .navbar-static-top {
            z-index: 1000;
            border-width: 0 0 1px;
        }
        @media (min-width: 768px) {
            .navbar-static-top {
                border-radius: 0;
            }
        }
        .navbar-fixed-top,
        .navbar-fixed-bottom {
            position: fixed;
            right: 0;
            left: 0;
            z-index: 1030;
        }
        @media (min-width: 768px) {
            .navbar-fixed-top,
            .navbar-fixed-bottom {
                border-radius: 0;
            }
        }
        .navbar-fixed-top {
            top: 0;
            border-width: 0 0 1px;
        }
        .navbar-fixed-bottom {
            bottom: 0;
            margin-bottom: 0;
            border-width: 1px 0 0;
        }
        .navbar-brand {
            float: left;
            height: 50px;
            padding: 15px 15px;
            font-size: 18px;
            line-height: 20px;
        }
        .navbar-brand:hover,
        .navbar-brand:focus {
            text-decoration: none;
        }
        .navbar-brand > img {
            display: block;
        }
        @media (min-width: 768px) {
            .navbar > .container .navbar-brand,
            .navbar > .container-fluid .navbar-brand {
                margin-left: -15px;
            }
        }
        .navbar-toggle {
            position: relative;
            float: right;
            padding: 9px 10px;
            margin-top: 8px;
            margin-right: 15px;
            margin-bottom: 8px;
            background-color: transparent;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .navbar-toggle:focus {
            outline: 0;
        }
        .navbar-toggle .icon-bar {
            display: block;
            width: 22px;
            height: 2px;
            border-radius: 1px;
        }
        .navbar-toggle .icon-bar + .icon-bar {
            margin-top: 4px;
        }
        @media (min-width: 768px) {
            .navbar-toggle {
                display: none;
            }
        }
        .navbar-nav {
            margin: 7.5px -15px;
        }
        .navbar-nav > li > a {
            padding-top: 10px;
            padding-bottom: 10px;
            line-height: 20px;
        }
        @media (max-width: 767px) {
            .navbar-nav .open .dropdown-menu {
                position: static;
                float: none;
                width: auto;
                margin-top: 0;
                background-color: transparent;
                border: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            .navbar-nav .open .dropdown-menu > li > a,
            .navbar-nav .open .dropdown-menu .dropdown-header {
                padding: 5px 15px 5px 25px;
            }
            .navbar-nav .open .dropdown-menu > li > a {
                line-height: 20px;
            }
            .navbar-nav .open .dropdown-menu > li > a:hover,
            .navbar-nav .open .dropdown-menu > li > a:focus {
                background-image: none;
            }
        }
        @media (min-width: 768px) {
            .navbar-nav {
                float: left;
                margin: 0;
            }
            .navbar-nav > li {
                float: left;
            }
            .navbar-nav > li > a {
                padding-top: 15px;
                padding-bottom: 15px;
            }
        }
        .navbar-form {
            padding: 10px 15px;
            margin-top: 8px;
            margin-right: -15px;
            margin-bottom: 8px;
            margin-left: -15px;
            border-top: 1px solid transparent;
            border-bottom: 1px solid transparent;
            -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
        }
        @media (min-width: 768px) {
            .navbar-form .form-group {
                display: inline-block;
                margin-bottom: 0;
                vertical-align: middle;
            }
            .navbar-form .form-control {
                display: inline-block;
                width: auto;
                vertical-align: middle;
            }
            .navbar-form .form-control-static {
                display: inline-block;
            }
            .navbar-form .input-group {
                display: inline-table;
                vertical-align: middle;
            }
            .navbar-form .input-group .input-group-addon,
            .navbar-form .input-group .input-group-btn,
            .navbar-form .input-group .form-control {
                width: auto;
            }
            .navbar-form .input-group > .form-control {
                width: 100%;
            }
            .navbar-form .control-label {
                margin-bottom: 0;
                vertical-align: middle;
            }
            .navbar-form .radio,
            .navbar-form .checkbox {
                display: inline-block;
                margin-top: 0;
                margin-bottom: 0;
                vertical-align: middle;
            }
            .navbar-form .radio label,
            .navbar-form .checkbox label {
                padding-left: 0;
            }
            .navbar-form .radio input[type="radio"],
            .navbar-form .checkbox input[type="checkbox"] {
                position: relative;
                margin-left: 0;
            }
            .navbar-form .has-feedback .form-control-feedback {
                top: 0;
            }
        }
        @media (max-width: 767px) {
            .navbar-form .form-group {
                margin-bottom: 5px;
            }
            .navbar-form .form-group:last-child {
                margin-bottom: 0;
            }
        }
        @media (min-width: 768px) {
            .navbar-form {
                width: auto;
                padding-top: 0;
                padding-bottom: 0;
                margin-right: 0;
                margin-left: 0;
                border: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
        }
        .navbar-nav > li > .dropdown-menu {
            margin-top: 0;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .navbar-fixed-bottom .navbar-nav > li > .dropdown-menu {
            margin-bottom: 0;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .navbar-btn {
            margin-top: 8px;
            margin-bottom: 8px;
        }
        .navbar-btn.btn-sm {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .navbar-btn.btn-xs {
            margin-top: 14px;
            margin-bottom: 14px;
        }
        .navbar-text {
            margin-top: 15px;
            margin-bottom: 15px;
        }
        @media (min-width: 768px) {
            .navbar-text {
                float: left;
                margin-right: 15px;
                margin-left: 15px;
            }
        }
        @media (min-width: 768px) {
            .navbar-left {
                float: left !important;
            }
            .navbar-right {
                float: right !important;
                margin-right: -15px;
            }
            .navbar-right ~ .navbar-right {
                margin-right: 0;
            }
        }
        .navbar-default {
            background-color: #f8f8f8;
            border-color: #e7e7e7;
        }
        .navbar-default .navbar-brand {
            color: #777;
        }
        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
            color: #5e5e5e;
            background-color: transparent;
        }
        .navbar-default .navbar-text {
            color: #777;
        }
        .navbar-default .navbar-nav > li > a {
            color: #777;
        }
        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > li > a:focus {
            color: #333;
            background-color: transparent;
        }
        .navbar-default .navbar-nav > .active > a,
        .navbar-default .navbar-nav > .active > a:hover,
        .navbar-default .navbar-nav > .active > a:focus {
            color: #555;
            background-color: #e7e7e7;
        }
        .navbar-default .navbar-nav > .disabled > a,
        .navbar-default .navbar-nav > .disabled > a:hover,
        .navbar-default .navbar-nav > .disabled > a:focus {
            color: #ccc;
            background-color: transparent;
        }
        .navbar-default .navbar-toggle {
            border-color: #ddd;
        }
        .navbar-default .navbar-toggle:hover,
        .navbar-default .navbar-toggle:focus {
            background-color: #ddd;
        }
        .navbar-default .navbar-toggle .icon-bar {
            background-color: #888;
        }
        .navbar-default .navbar-collapse,
        .navbar-default .navbar-form {
            border-color: #e7e7e7;
        }
        .navbar-default .navbar-nav > .open > a,
        .navbar-default .navbar-nav > .open > a:hover,
        .navbar-default .navbar-nav > .open > a:focus {
            color: #555;
            background-color: #e7e7e7;
        }
        @media (max-width: 767px) {
            .navbar-default .navbar-nav .open .dropdown-menu > li > a {
                color: #777;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
                color: #333;
                background-color: transparent;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
                color: #555;
                background-color: #e7e7e7;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a,
            .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:focus {
                color: #ccc;
                background-color: transparent;
            }
        }
        .navbar-default .navbar-link {
            color: #777;
        }
        .navbar-default .navbar-link:hover {
            color: #333;
        }
        .navbar-default .btn-link {
            color: #777;
        }
        .navbar-default .btn-link:hover,
        .navbar-default .btn-link:focus {
            color: #333;
        }
        .navbar-default .btn-link[disabled]:hover,
        fieldset[disabled] .navbar-default .btn-link:hover,
        .navbar-default .btn-link[disabled]:focus,
        fieldset[disabled] .navbar-default .btn-link:focus {
            color: #ccc;
        }
        .navbar-inverse {
            background-color: #222;
            border-color: #080808;
        }
        .navbar-inverse .navbar-brand {
            color: #9d9d9d;
        }
        .navbar-inverse .navbar-brand:hover,
        .navbar-inverse .navbar-brand:focus {
            color: #fff;
            background-color: transparent;
        }
        .navbar-inverse .navbar-text {
            color: #9d9d9d;
        }
        .navbar-inverse .navbar-nav > li > a {
            color: #9d9d9d;
        }
        .navbar-inverse .navbar-nav > li > a:hover,
        .navbar-inverse .navbar-nav > li > a:focus {
            color: #fff;
            background-color: transparent;
        }
        .navbar-inverse .navbar-nav > .active > a,
        .navbar-inverse .navbar-nav > .active > a:hover,
        .navbar-inverse .navbar-nav > .active > a:focus {
            color: #fff;
            background-color: #080808;
        }
        .navbar-inverse .navbar-nav > .disabled > a,
        .navbar-inverse .navbar-nav > .disabled > a:hover,
        .navbar-inverse .navbar-nav > .disabled > a:focus {
            color: #444;
            background-color: transparent;
        }
        .navbar-inverse .navbar-toggle {
            border-color: #333;
        }
        .navbar-inverse .navbar-toggle:hover,
        .navbar-inverse .navbar-toggle:focus {
            background-color: #333;
        }
        .navbar-inverse .navbar-toggle .icon-bar {
            background-color: #fff;
        }
        .navbar-inverse .navbar-collapse,
        .navbar-inverse .navbar-form {
            border-color: #101010;
        }
        .navbar-inverse .navbar-nav > .open > a,
        .navbar-inverse .navbar-nav > .open > a:hover,
        .navbar-inverse .navbar-nav > .open > a:focus {
            color: #fff;
            background-color: #080808;
        }
        @media (max-width: 767px) {
            .navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header {
                border-color: #080808;
            }
            .navbar-inverse .navbar-nav .open .dropdown-menu .divider {
                background-color: #080808;
            }
            .navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
                color: #9d9d9d;
            }
            .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover,
            .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus {
                color: #fff;
                background-color: transparent;
            }
            .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a,
            .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover,
            .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus {
                color: #fff;
                background-color: #080808;
            }
            .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a,
            .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover,
            .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus {
                color: #444;
                background-color: transparent;
            }
        }
        .navbar-inverse .navbar-link {
            color: #9d9d9d;
        }
        .navbar-inverse .navbar-link:hover {
            color: #fff;
        }
        .navbar-inverse .btn-link {
            color: #9d9d9d;
        }
        .navbar-inverse .btn-link:hover,
        .navbar-inverse .btn-link:focus {
            color: #fff;
        }
        .navbar-inverse .btn-link[disabled]:hover,
        fieldset[disabled] .navbar-inverse .btn-link:hover,
        .navbar-inverse .btn-link[disabled]:focus,
        fieldset[disabled] .navbar-inverse .btn-link:focus {
            color: #444;
        }
        .breadcrumb {
            padding: 8px 15px;
            margin-bottom: 20px;
            list-style: none;
            background-color: #f5f5f5;
            border-radius: 4px;
        }
        .breadcrumb > li {
            display: inline-block;
        }
        .breadcrumb > li + li:before {
            padding: 0 5px;
            color: #ccc;
            content: "/\00a0";
        }
        .breadcrumb > .active {
            color: #777;
        }
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination > li {
            display: inline;
        }
        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
            color: #23527c;
            background-color: #eee;
            border-color: #ddd;
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #337ab7;
            border-color: #337ab7;
        }
        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }
        .pagination-lg > li > a,
        .pagination-lg > li > span {
            padding: 10px 16px;
            font-size: 18px;
        }
        .pagination-lg > li:first-child > a,
        .pagination-lg > li:first-child > span {
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
        }
        .pagination-lg > li:last-child > a,
        .pagination-lg > li:last-child > span {
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
        }
        .pagination-sm > li > a,
        .pagination-sm > li > span {
            padding: 5px 10px;
            font-size: 12px;
        }
        .pagination-sm > li:first-child > a,
        .pagination-sm > li:first-child > span {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        .pagination-sm > li:last-child > a,
        .pagination-sm > li:last-child > span {
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }
        .pager {
            padding-left: 0;
            margin: 20px 0;
            text-align: center;
            list-style: none;
        }
        .pager li {
            display: inline;
        }
        .pager li > a,
        .pager li > span {
            display: inline-block;
            padding: 5px 14px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 15px;
        }
        .pager li > a:hover,
        .pager li > a:focus {
            text-decoration: none;
            background-color: #eee;
        }
        .pager .next > a,
        .pager .next > span {
            float: right;
        }
        .pager .previous > a,
        .pager .previous > span {
            float: left;
        }
        .pager .disabled > a,
        .pager .disabled > a:hover,
        .pager .disabled > a:focus,
        .pager .disabled > span {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
        }
        .label {
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: bold;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
        }
        a.label:hover,
        a.label:focus {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }
        .label:empty {
            display: none;
        }
        .btn .label {
            position: relative;
            top: -1px;
        }
        .label-default {
            background-color: #777;
        }
        .label-default[href]:hover,
        .label-default[href]:focus {
            background-color: #5e5e5e;
        }
        .label-primary {
            background-color: #337ab7;
        }
        .label-primary[href]:hover,
        .label-primary[href]:focus {
            background-color: #286090;
        }
        .label-success {
            background-color: #5cb85c;
        }
        .label-success[href]:hover,
        .label-success[href]:focus {
            background-color: #449d44;
        }
        .label-info {
            background-color: #5bc0de;
        }
        .label-info[href]:hover,
        .label-info[href]:focus {
            background-color: #31b0d5;
        }
        .label-warning {
            background-color: #f0ad4e;
        }
        .label-warning[href]:hover,
        .label-warning[href]:focus {
            background-color: #ec971f;
        }
        .label-danger {
            background-color: #d9534f;
        }
        .label-danger[href]:hover,
        .label-danger[href]:focus {
            background-color: #c9302c;
        }
        .badge {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: bold;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            background-color: #777;
            border-radius: 10px;
        }
        .badge:empty {
            display: none;
        }
        .btn .badge {
            position: relative;
            top: -1px;
        }
        .btn-xs .badge,
        .btn-group-xs > .btn .badge {
            top: 0;
            padding: 1px 5px;
        }
        a.badge:hover,
        a.badge:focus {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }
        .list-group-item.active > .badge,
        .nav-pills > .active > a > .badge {
            color: #337ab7;
            background-color: #fff;
        }
        .list-group-item > .badge {
            float: right;
        }
        .list-group-item > .badge + .badge {
            margin-right: 5px;
        }
        .nav-pills > li > a > .badge {
            margin-left: 3px;
        }
        .jumbotron {
            padding: 30px 15px;
            margin-bottom: 30px;
            color: inherit;
            background-color: #eee;
        }
        .jumbotron h1,
        .jumbotron .h1 {
            color: inherit;
        }
        .jumbotron p {
            margin-bottom: 15px;
            font-size: 21px;
            font-weight: 200;
        }
        .jumbotron > hr {
            border-top-color: #d5d5d5;
        }
        .container .jumbotron,
        .container-fluid .jumbotron {
            border-radius: 6px;
        }
        .jumbotron .container {
            max-width: 100%;
        }
        @media screen and (min-width: 768px) {
            .jumbotron {
                padding: 48px 0;
            }
            .container .jumbotron,
            .container-fluid .jumbotron {
                padding-right: 60px;
                padding-left: 60px;
            }
            .jumbotron h1,
            .jumbotron .h1 {
                font-size: 63px;
            }
        }
        .thumbnail {
            display: block;
            padding: 4px;
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: border .2s ease-in-out;
            -o-transition: border .2s ease-in-out;
            transition: border .2s ease-in-out;
        }
        .thumbnail > img,
        .thumbnail a > img {
            margin-right: auto;
            margin-left: auto;
        }
        a.thumbnail:hover,
        a.thumbnail:focus,
        a.thumbnail.active {
            border-color: #337ab7;
        }
        .thumbnail .caption {
            padding: 9px;
            color: #333;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert h4 {
            margin-top: 0;
            color: inherit;
        }
        .alert .alert-link {
            font-weight: bold;
        }
        .alert > p,
        .alert > ul {
            margin-bottom: 0;
        }
        .alert > p + p {
            margin-top: 5px;
        }
        .alert-dismissable,
        .alert-dismissible {
            padding-right: 35px;
        }
        .alert-dismissable .close,
        .alert-dismissible .close {
            position: relative;
            top: -2px;
            right: -21px;
            color: inherit;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .alert-success hr {
            border-top-color: #c9e2b3;
        }
        .alert-success .alert-link {
            color: #2b542c;
        }
        .alert-info {
            color: #31708f;
            background-color: #d9edf7;
            border-color: #bce8f1;
        }
        .alert-info hr {
            border-top-color: #a6e1ec;
        }
        .alert-info .alert-link {
            color: #245269;
        }
        .alert-warning {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
        }
        .alert-warning hr {
            border-top-color: #f7e1b5;
        }
        .alert-warning .alert-link {
            color: #66512c;
        }
        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        .alert-danger hr {
            border-top-color: #e4b9c0;
        }
        .alert-danger .alert-link {
            color: #843534;
        }
        @-webkit-keyframes progress-bar-stripes {
            from {
                background-position: 40px 0;
            }
            to {
                background-position: 0 0;
            }
        }
        @-o-keyframes progress-bar-stripes {
            from {
                background-position: 40px 0;
            }
            to {
                background-position: 0 0;
            }
        }
        @keyframes progress-bar-stripes {
            from {
                background-position: 40px 0;
            }
            to {
                background-position: 0 0;
            }
        }
        .progress {
            height: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            background-color: #f5f5f5;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
        }
        .progress-bar {
            float: left;
            width: 0;
            height: 100%;
            font-size: 12px;
            line-height: 20px;
            color: #fff;
            text-align: center;
            background-color: #337ab7;
            -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
            -webkit-transition: width .6s ease;
            -o-transition: width .6s ease;
            transition: width .6s ease;
        }
        .progress-striped .progress-bar,
        .progress-bar-striped {
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            -webkit-background-size: 40px 40px;
            background-size: 40px 40px;
        }
        .progress.active .progress-bar,
        .progress-bar.active {
            -webkit-animation: progress-bar-stripes 2s linear infinite;
            -o-animation: progress-bar-stripes 2s linear infinite;
            animation: progress-bar-stripes 2s linear infinite;
        }
        .progress-bar-success {
            background-color: #5cb85c;
        }
        .progress-striped .progress-bar-success {
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        }
        .progress-bar-info {
            background-color: #5bc0de;
        }
        .progress-striped .progress-bar-info {
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        }
        .progress-bar-warning {
            background-color: #f0ad4e;
        }
        .progress-striped .progress-bar-warning {
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        }
        .progress-bar-danger {
            background-color: #d9534f;
        }
        .progress-striped .progress-bar-danger {
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        }
        .media {
            margin-top: 15px;
        }
        .media:first-child {
            margin-top: 0;
        }
        .media,
        .media-body {
            overflow: hidden;
            zoom: 1;
        }
        .media-body {
            width: 10000px;
        }
        .media-object {
            display: block;
        }
        .media-right,
        .media > .pull-right {
            padding-left: 10px;
        }
        .media-left,
        .media > .pull-left {
            padding-right: 10px;
        }
        .media-left,
        .media-right,
        .media-body {
            display: table-cell;
            vertical-align: top;
        }
        .media-middle {
            vertical-align: middle;
        }
        .media-bottom {
            vertical-align: bottom;
        }
        .media-heading {
            margin-top: 0;
            margin-bottom: 5px;
        }
        .media-list {
            padding-left: 0;
            list-style: none;
        }
        .list-group {
            padding-left: 0;
            margin-bottom: 20px;
        }
        .list-group-item {
            position: relative;
            display: block;
            padding: 10px 15px;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .list-group-item:first-child {
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        .list-group-item:last-child {
            margin-bottom: 0;
            border-bottom-right-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        a.list-group-item {
            color: #555;
        }
        a.list-group-item .list-group-item-heading {
            color: #333;
        }
        a.list-group-item:hover,
        a.list-group-item:focus {
            color: #555;
            text-decoration: none;
            background-color: #f5f5f5;
        }
        .list-group-item.disabled,
        .list-group-item.disabled:hover,
        .list-group-item.disabled:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #eee;
        }
        .list-group-item.disabled .list-group-item-heading,
        .list-group-item.disabled:hover .list-group-item-heading,
        .list-group-item.disabled:focus .list-group-item-heading {
            color: inherit;
        }
        .list-group-item.disabled .list-group-item-text,
        .list-group-item.disabled:hover .list-group-item-text,
        .list-group-item.disabled:focus .list-group-item-text {
            color: #777;
        }
        .list-group-item.active,
        .list-group-item.active:hover,
        .list-group-item.active:focus {
            z-index: 2;
            color: #fff;
            background-color: #337ab7;
            border-color: #337ab7;
        }
        .list-group-item.active .list-group-item-heading,
        .list-group-item.active:hover .list-group-item-heading,
        .list-group-item.active:focus .list-group-item-heading,
        .list-group-item.active .list-group-item-heading > small,
        .list-group-item.active:hover .list-group-item-heading > small,
        .list-group-item.active:focus .list-group-item-heading > small,
        .list-group-item.active .list-group-item-heading > .small,
        .list-group-item.active:hover .list-group-item-heading > .small,
        .list-group-item.active:focus .list-group-item-heading > .small {
            color: inherit;
        }
        .list-group-item.active .list-group-item-text,
        .list-group-item.active:hover .list-group-item-text,
        .list-group-item.active:focus .list-group-item-text {
            color: #c7ddef;
        }
        .list-group-item-success {
            color: #3c763d;
            background-color: #dff0d8;
        }
        a.list-group-item-success {
            color: #3c763d;
        }
        a.list-group-item-success .list-group-item-heading {
            color: inherit;
        }
        a.list-group-item-success:hover,
        a.list-group-item-success:focus {
            color: #3c763d;
            background-color: #d0e9c6;
        }
        a.list-group-item-success.active,
        a.list-group-item-success.active:hover,
        a.list-group-item-success.active:focus {
            color: #fff;
            background-color: #3c763d;
            border-color: #3c763d;
        }
        .list-group-item-info {
            color: #31708f;
            background-color: #d9edf7;
        }
        a.list-group-item-info {
            color: #31708f;
        }
        a.list-group-item-info .list-group-item-heading {
            color: inherit;
        }
        a.list-group-item-info:hover,
        a.list-group-item-info:focus {
            color: #31708f;
            background-color: #c4e3f3;
        }
        a.list-group-item-info.active,
        a.list-group-item-info.active:hover,
        a.list-group-item-info.active:focus {
            color: #fff;
            background-color: #31708f;
            border-color: #31708f;
        }
        .list-group-item-warning {
            color: #8a6d3b;
            background-color: #fcf8e3;
        }
        a.list-group-item-warning {
            color: #8a6d3b;
        }
        a.list-group-item-warning .list-group-item-heading {
            color: inherit;
        }
        a.list-group-item-warning:hover,
        a.list-group-item-warning:focus {
            color: #8a6d3b;
            background-color: #faf2cc;
        }
        a.list-group-item-warning.active,
        a.list-group-item-warning.active:hover,
        a.list-group-item-warning.active:focus {
            color: #fff;
            background-color: #8a6d3b;
            border-color: #8a6d3b;
        }
        .list-group-item-danger {
            color: #a94442;
            background-color: #f2dede;
        }
        a.list-group-item-danger {
            color: #a94442;
        }
        a.list-group-item-danger .list-group-item-heading {
            color: inherit;
        }
        a.list-group-item-danger:hover,
        a.list-group-item-danger:focus {
            color: #a94442;
            background-color: #ebcccc;
        }
        a.list-group-item-danger.active,
        a.list-group-item-danger.active:hover,
        a.list-group-item-danger.active:focus {
            color: #fff;
            background-color: #a94442;
            border-color: #a94442;
        }
        .list-group-item-heading {
            margin-top: 0;
            margin-bottom: 5px;
        }
        .list-group-item-text {
            margin-bottom: 0;
            line-height: 1.3;
        }
        .panel {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }
        .panel-body {
            padding: 15px;
        }
        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }
        .panel-heading > .dropdown .dropdown-toggle {
            color: inherit;
        }
        .panel-title {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 16px;
            color: inherit;
        }
        .panel-title > a,
        .panel-title > small,
        .panel-title > .small,
        .panel-title > small > a,
        .panel-title > .small > a {
            color: inherit;
        }
        .panel-footer {
            padding: 10px 15px;
            background-color: #f5f5f5;
            border-top: 1px solid #ddd;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        .panel > .list-group,
        .panel > .panel-collapse > .list-group {
            margin-bottom: 0;
        }
        .panel > .list-group .list-group-item,
        .panel > .panel-collapse > .list-group .list-group-item {
            border-width: 1px 0;
            border-radius: 0;
        }
        .panel > .list-group:first-child .list-group-item:first-child,
        .panel > .panel-collapse > .list-group:first-child .list-group-item:first-child {
            border-top: 0;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }
        .panel > .list-group:last-child .list-group-item:last-child,
        .panel > .panel-collapse > .list-group:last-child .list-group-item:last-child {
            border-bottom: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        .panel-heading + .list-group .list-group-item:first-child {
            border-top-width: 0;
        }
        .list-group + .panel-footer {
            border-top-width: 0;
        }
        .panel > .table,
        .panel > .table-responsive > .table,
        .panel > .panel-collapse > .table {
            margin-bottom: 0;
        }
        .panel > .table caption,
        .panel > .table-responsive > .table caption,
        .panel > .panel-collapse > .table caption {
            padding-right: 15px;
            padding-left: 15px;
        }
        .panel > .table:first-child,
        .panel > .table-responsive:first-child > .table:first-child {
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }
        .panel > .table:first-child > thead:first-child > tr:first-child,
        .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child,
        .panel > .table:first-child > tbody:first-child > tr:first-child,
        .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child {
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }
        .panel > .table:first-child > thead:first-child > tr:first-child td:first-child,
        .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:first-child,
        .panel > .table:first-child > tbody:first-child > tr:first-child td:first-child,
        .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:first-child,
        .panel > .table:first-child > thead:first-child > tr:first-child th:first-child,
        .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:first-child,
        .panel > .table:first-child > tbody:first-child > tr:first-child th:first-child,
        .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:first-child {
            border-top-left-radius: 3px;
        }
        .panel > .table:first-child > thead:first-child > tr:first-child td:last-child,
        .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:last-child,
        .panel > .table:first-child > tbody:first-child > tr:first-child td:last-child,
        .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:last-child,
        .panel > .table:first-child > thead:first-child > tr:first-child th:last-child,
        .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:last-child,
        .panel > .table:first-child > tbody:first-child > tr:first-child th:last-child,
        .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:last-child {
            border-top-right-radius: 3px;
        }
        .panel > .table:last-child,
        .panel > .table-responsive:last-child > .table:last-child {
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        .panel > .table:last-child > tbody:last-child > tr:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child,
        .panel > .table:last-child > tfoot:last-child > tr:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child {
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        .panel > .table:last-child > tbody:last-child > tr:last-child td:first-child,
        .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:first-child,
        .panel > .table:last-child > tfoot:last-child > tr:last-child td:first-child,
        .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:first-child,
        .panel > .table:last-child > tbody:last-child > tr:last-child th:first-child,
        .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:first-child,
        .panel > .table:last-child > tfoot:last-child > tr:last-child th:first-child,
        .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:first-child {
            border-bottom-left-radius: 3px;
        }
        .panel > .table:last-child > tbody:last-child > tr:last-child td:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:last-child,
        .panel > .table:last-child > tfoot:last-child > tr:last-child td:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:last-child,
        .panel > .table:last-child > tbody:last-child > tr:last-child th:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:last-child,
        .panel > .table:last-child > tfoot:last-child > tr:last-child th:last-child,
        .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:last-child {
            border-bottom-right-radius: 3px;
        }
        .panel > .panel-body + .table,
        .panel > .panel-body + .table-responsive,
        .panel > .table + .panel-body,
        .panel > .table-responsive + .panel-body {
            border-top: 1px solid #ddd;
        }
        .panel > .table > tbody:first-child > tr:first-child th,
        .panel > .table > tbody:first-child > tr:first-child td {
            border-top: 0;
        }
        .panel > .table-bordered,
        .panel > .table-responsive > .table-bordered {
            border: 0;
        }
        .panel > .table-bordered > thead > tr > th:first-child,
        .panel > .table-responsive > .table-bordered > thead > tr > th:first-child,
        .panel > .table-bordered > tbody > tr > th:first-child,
        .panel > .table-responsive > .table-bordered > tbody > tr > th:first-child,
        .panel > .table-bordered > tfoot > tr > th:first-child,
        .panel > .table-responsive > .table-bordered > tfoot > tr > th:first-child,
        .panel > .table-bordered > thead > tr > td:first-child,
        .panel > .table-responsive > .table-bordered > thead > tr > td:first-child,
        .panel > .table-bordered > tbody > tr > td:first-child,
        .panel > .table-responsive > .table-bordered > tbody > tr > td:first-child,
        .panel > .table-bordered > tfoot > tr > td:first-child,
        .panel > .table-responsive > .table-bordered > tfoot > tr > td:first-child {
            border-left: 0;
        }
        .panel > .table-bordered > thead > tr > th:last-child,
        .panel > .table-responsive > .table-bordered > thead > tr > th:last-child,
        .panel > .table-bordered > tbody > tr > th:last-child,
        .panel > .table-responsive > .table-bordered > tbody > tr > th:last-child,
        .panel > .table-bordered > tfoot > tr > th:last-child,
        .panel > .table-responsive > .table-bordered > tfoot > tr > th:last-child,
        .panel > .table-bordered > thead > tr > td:last-child,
        .panel > .table-responsive > .table-bordered > thead > tr > td:last-child,
        .panel > .table-bordered > tbody > tr > td:last-child,
        .panel > .table-responsive > .table-bordered > tbody > tr > td:last-child,
        .panel > .table-bordered > tfoot > tr > td:last-child,
        .panel > .table-responsive > .table-bordered > tfoot > tr > td:last-child {
            border-right: 0;
        }
        .panel > .table-bordered > thead > tr:first-child > td,
        .panel > .table-responsive > .table-bordered > thead > tr:first-child > td,
        .panel > .table-bordered > tbody > tr:first-child > td,
        .panel > .table-responsive > .table-bordered > tbody > tr:first-child > td,
        .panel > .table-bordered > thead > tr:first-child > th,
        .panel > .table-responsive > .table-bordered > thead > tr:first-child > th,
        .panel > .table-bordered > tbody > tr:first-child > th,
        .panel > .table-responsive > .table-bordered > tbody > tr:first-child > th {
            border-bottom: 0;
        }
        .panel > .table-bordered > tbody > tr:last-child > td,
        .panel > .table-responsive > .table-bordered > tbody > tr:last-child > td,
        .panel > .table-bordered > tfoot > tr:last-child > td,
        .panel > .table-responsive > .table-bordered > tfoot > tr:last-child > td,
        .panel > .table-bordered > tbody > tr:last-child > th,
        .panel > .table-responsive > .table-bordered > tbody > tr:last-child > th,
        .panel > .table-bordered > tfoot > tr:last-child > th,
        .panel > .table-responsive > .table-bordered > tfoot > tr:last-child > th {
            border-bottom: 0;
        }
        .panel > .table-responsive {
            margin-bottom: 0;
            border: 0;
        }
        .panel-group {
            margin-bottom: 20px;
        }
        .panel-group .panel {
            margin-bottom: 0;
            border-radius: 4px;
        }
        .panel-group .panel + .panel {
            margin-top: 5px;
        }
        .panel-group .panel-heading {
            border-bottom: 0;
        }
        .panel-group .panel-heading + .panel-collapse > .panel-body,
        .panel-group .panel-heading + .panel-collapse > .list-group {
            border-top: 1px solid #ddd;
        }
        .panel-group .panel-footer {
            border-top: 0;
        }
        .panel-group .panel-footer + .panel-collapse .panel-body {
            border-bottom: 1px solid #ddd;
        }
        .panel-default {
            border-color: #ddd;
        }
        .panel-default > .panel-heading {
            color: #333;
            background-color: #f5f5f5;
            border-color: #ddd;
        }
        .panel-default > .panel-heading + .panel-collapse > .panel-body {
            border-top-color: #ddd;
        }
        .panel-default > .panel-heading .badge {
            color: #f5f5f5;
            background-color: #333;
        }
        .panel-default > .panel-footer + .panel-collapse > .panel-body {
            border-bottom-color: #ddd;
        }
        .panel-primary {
            border-color: #337ab7;
        }
        .panel-primary > .panel-heading {
            color: #fff;
            background-color: #337ab7;
            border-color: #337ab7;
        }
        .panel-primary > .panel-heading + .panel-collapse > .panel-body {
            border-top-color: #337ab7;
        }
        .panel-primary > .panel-heading .badge {
            color: #337ab7;
            background-color: #fff;
        }
        .panel-primary > .panel-footer + .panel-collapse > .panel-body {
            border-bottom-color: #337ab7;
        }
        .panel-success {
            border-color: #d6e9c6;
        }
        .panel-success > .panel-heading {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .panel-success > .panel-heading + .panel-collapse > .panel-body {
            border-top-color: #d6e9c6;
        }
        .panel-success > .panel-heading .badge {
            color: #dff0d8;
            background-color: #3c763d;
        }
        .panel-success > .panel-footer + .panel-collapse > .panel-body {
            border-bottom-color: #d6e9c6;
        }
        .panel-info {
            border-color: #bce8f1;
        }
        .panel-info > .panel-heading {
            color: #31708f;
            background-color: #d9edf7;
            border-color: #bce8f1;
        }
        .panel-info > .panel-heading + .panel-collapse > .panel-body {
            border-top-color: #bce8f1;
        }
        .panel-info > .panel-heading .badge {
            color: #d9edf7;
            background-color: #31708f;
        }
        .panel-info > .panel-footer + .panel-collapse > .panel-body {
            border-bottom-color: #bce8f1;
        }
        .panel-warning {
            border-color: #faebcc;
        }
        .panel-warning > .panel-heading {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
        }
        .panel-warning > .panel-heading + .panel-collapse > .panel-body {
            border-top-color: #faebcc;
        }
        .panel-warning > .panel-heading .badge {
            color: #fcf8e3;
            background-color: #8a6d3b;
        }
        .panel-warning > .panel-footer + .panel-collapse > .panel-body {
            border-bottom-color: #faebcc;
        }
        .panel-danger {
            border-color: #ebccd1;
        }
        .panel-danger > .panel-heading {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        .panel-danger > .panel-heading + .panel-collapse > .panel-body {
            border-top-color: #ebccd1;
        }
        .panel-danger > .panel-heading .badge {
            color: #f2dede;
            background-color: #a94442;
        }
        .panel-danger > .panel-footer + .panel-collapse > .panel-body {
            border-bottom-color: #ebccd1;
        }
        .embed-responsive {
            position: relative;
            display: block;
            height: 0;
            padding: 0;
            overflow: hidden;
        }
        .embed-responsive .embed-responsive-item,
        .embed-responsive iframe,
        .embed-responsive embed,
        .embed-responsive object,
        .embed-responsive video {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        .embed-responsive-16by9 {
            padding-bottom: 56.25%;
        }
        .embed-responsive-4by3 {
            padding-bottom: 75%;
        }
        .well {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        }
        .well blockquote {
            border-color: #ddd;
            border-color: rgba(0, 0, 0, .15);
        }
        .well-lg {
            padding: 24px;
            border-radius: 6px;
        }
        .well-sm {
            padding: 9px;
            border-radius: 3px;
        }
        .close {
            float: right;
            font-size: 21px;
            font-weight: bold;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            filter: alpha(opacity=20);
            opacity: .2;
        }
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            filter: alpha(opacity=50);
            opacity: .5;
        }
        button.close {
            -webkit-appearance: none;
            padding: 0;
            cursor: pointer;
            background: transparent;
            border: 0;
        }
        .modal-open {
            overflow: hidden;
        }
        .modal {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            display: none;
            overflow: hidden;
            -webkit-overflow-scrolling: touch;
            outline: 0;
        }
        .modal.fade .modal-dialog {
            -webkit-transition: -webkit-transform .3s ease-out;
            -o-transition:      -o-transform .3s ease-out;
            transition:         transform .3s ease-out;
            -webkit-transform: translate(0, -25%);
            -ms-transform: translate(0, -25%);
            -o-transform: translate(0, -25%);
            transform: translate(0, -25%);
        }
        .modal.in .modal-dialog {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
        }
        .modal-open .modal {
            overflow-x: hidden;
            overflow-y: auto;
        }
        .modal-dialog {
            position: relative;
            width: auto;
            margin: 10px;
        }
        .modal-content {
            position: relative;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #999;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 6px;
            outline: 0;
            -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
            box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
        }
        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #000;
        }
        .modal-backdrop.fade {
            filter: alpha(opacity=0);
            opacity: 0;
        }
        .modal-backdrop.in {
            filter: alpha(opacity=50);
            opacity: .5;
        }
        .modal-header {
            min-height: 16.42857143px;
            padding: 15px;
            border-bottom: 1px solid #e5e5e5;
        }
        .modal-header .close {
            margin-top: -2px;
        }
        .modal-title {
            margin: 0;
            line-height: 1.42857143;
        }
        .modal-body {
            position: relative;
            padding: 15px;
        }
        .modal-footer {
            padding: 15px;
            text-align: right;
            border-top: 1px solid #e5e5e5;
        }
        .modal-footer .btn + .btn {
            margin-bottom: 0;
            margin-left: 5px;
        }
        .modal-footer .btn-group .btn + .btn {
            margin-left: -1px;
        }
        .modal-footer .btn-block + .btn-block {
            margin-left: 0;
        }
        .modal-scrollbar-measure {
            position: absolute;
            top: -9999px;
            width: 50px;
            height: 50px;
            overflow: scroll;
        }
        @media (min-width: 768px) {
            .modal-dialog {
                width: 600px;
                margin: 30px auto;
            }
            .modal-content {
                -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
                box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            }
            .modal-sm {
                width: 300px;
            }
        }
        @media (min-width: 992px) {
            .modal-lg {
                width: 900px;
            }
        }
        .tooltip {
            position: absolute;
            z-index: 1070;
            display: block;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: normal;
            line-height: 1.4;
            filter: alpha(opacity=0);
            opacity: 0;
        }
        .tooltip.in {
            filter: alpha(opacity=90);
            opacity: .9;
        }
        .tooltip.top {
            padding: 5px 0;
            margin-top: -3px;
        }
        .tooltip.right {
            padding: 0 5px;
            margin-left: 3px;
        }
        .tooltip.bottom {
            padding: 5px 0;
            margin-top: 3px;
        }
        .tooltip.left {
            padding: 0 5px;
            margin-left: -3px;
        }
        .tooltip-inner {
            max-width: 200px;
            padding: 3px 8px;
            color: #fff;
            text-align: center;
            text-decoration: none;
            background-color: #000;
            border-radius: 4px;
        }
        .tooltip-arrow {
            position: absolute;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
        }
        .tooltip.top .tooltip-arrow {
            bottom: 0;
            left: 50%;
            margin-left: -5px;
            border-width: 5px 5px 0;
            border-top-color: #000;
        }
        .tooltip.top-left .tooltip-arrow {
            right: 5px;
            bottom: 0;
            margin-bottom: -5px;
            border-width: 5px 5px 0;
            border-top-color: #000;
        }
        .tooltip.top-right .tooltip-arrow {
            bottom: 0;
            left: 5px;
            margin-bottom: -5px;
            border-width: 5px 5px 0;
            border-top-color: #000;
        }
        .tooltip.right .tooltip-arrow {
            top: 50%;
            left: 0;
            margin-top: -5px;
            border-width: 5px 5px 5px 0;
            border-right-color: #000;
        }
        .tooltip.left .tooltip-arrow {
            top: 50%;
            right: 0;
            margin-top: -5px;
            border-width: 5px 0 5px 5px;
            border-left-color: #000;
        }
        .tooltip.bottom .tooltip-arrow {
            top: 0;
            left: 50%;
            margin-left: -5px;
            border-width: 0 5px 5px;
            border-bottom-color: #000;
        }
        .tooltip.bottom-left .tooltip-arrow {
            top: 0;
            right: 5px;
            margin-top: -5px;
            border-width: 0 5px 5px;
            border-bottom-color: #000;
        }
        .tooltip.bottom-right .tooltip-arrow {
            top: 0;
            left: 5px;
            margin-top: -5px;
            border-width: 0 5px 5px;
            border-bottom-color: #000;
        }
        .popover {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1060;
            display: none;
            max-width: 276px;
            padding: 1px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: left;
            white-space: normal;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 6px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }
        .popover.top {
            margin-top: -10px;
        }
        .popover.right {
            margin-left: 10px;
        }
        .popover.bottom {
            margin-top: 10px;
        }
        .popover.left {
            margin-left: -10px;
        }
        .popover-title {
            padding: 8px 14px;
            margin: 0;
            font-size: 14px;
            background-color: #f7f7f7;
            border-bottom: 1px solid #ebebeb;
            border-radius: 5px 5px 0 0;
        }
        .popover-content {
            padding: 9px 14px;
        }
        .popover > .arrow,
        .popover > .arrow:after {
            position: absolute;
            display: block;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
        }
        .popover > .arrow {
            border-width: 11px;
        }
        .popover > .arrow:after {
            content: "";
            border-width: 10px;
        }
        .popover.top > .arrow {
            bottom: -11px;
            left: 50%;
            margin-left: -11px;
            border-top-color: #999;
            border-top-color: rgba(0, 0, 0, .25);
            border-bottom-width: 0;
        }
        .popover.top > .arrow:after {
            bottom: 1px;
            margin-left: -10px;
            content: " ";
            border-top-color: #fff;
            border-bottom-width: 0;
        }
        .popover.right > .arrow {
            top: 50%;
            left: -11px;
            margin-top: -11px;
            border-right-color: #999;
            border-right-color: rgba(0, 0, 0, .25);
            border-left-width: 0;
        }
        .popover.right > .arrow:after {
            bottom: -10px;
            left: 1px;
            content: " ";
            border-right-color: #fff;
            border-left-width: 0;
        }
        .popover.bottom > .arrow {
            top: -11px;
            left: 50%;
            margin-left: -11px;
            border-top-width: 0;
            border-bottom-color: #999;
            border-bottom-color: rgba(0, 0, 0, .25);
        }
        .popover.bottom > .arrow:after {
            top: 1px;
            margin-left: -10px;
            content: " ";
            border-top-width: 0;
            border-bottom-color: #fff;
        }
        .popover.left > .arrow {
            top: 50%;
            right: -11px;
            margin-top: -11px;
            border-right-width: 0;
            border-left-color: #999;
            border-left-color: rgba(0, 0, 0, .25);
        }
        .popover.left > .arrow:after {
            right: 1px;
            bottom: -10px;
            content: " ";
            border-right-width: 0;
            border-left-color: #fff;
        }
        .carousel {
            position: relative;
        }
        .carousel-inner {
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        .carousel-inner > .item {
            position: relative;
            display: none;
            -webkit-transition: .6s ease-in-out left;
            -o-transition: .6s ease-in-out left;
            transition: .6s ease-in-out left;
        }
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            line-height: 1;
        }
        @media all and (transform-3d), (-webkit-transform-3d) {
            .carousel-inner > .item {
                -webkit-transition: -webkit-transform .6s ease-in-out;
                -o-transition:      -o-transform .6s ease-in-out;
                transition:         transform .6s ease-in-out;

                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                -webkit-perspective: 1000;
                perspective: 1000;
            }
            .carousel-inner > .item.next,
            .carousel-inner > .item.active.right {
                left: 0;
                -webkit-transform: translate3d(100%, 0, 0);
                transform: translate3d(100%, 0, 0);
            }
            .carousel-inner > .item.prev,
            .carousel-inner > .item.active.left {
                left: 0;
                -webkit-transform: translate3d(-100%, 0, 0);
                transform: translate3d(-100%, 0, 0);
            }
            .carousel-inner > .item.next.left,
            .carousel-inner > .item.prev.right,
            .carousel-inner > .item.active {
                left: 0;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
        }
        .carousel-inner > .active,
        .carousel-inner > .next,
        .carousel-inner > .prev {
            display: block;
        }
        .carousel-inner > .active {
            left: 0;
        }
        .carousel-inner > .next,
        .carousel-inner > .prev {
            position: absolute;
            top: 0;
            width: 100%;
        }
        .carousel-inner > .next {
            left: 100%;
        }
        .carousel-inner > .prev {
            left: -100%;
        }
        .carousel-inner > .next.left,
        .carousel-inner > .prev.right {
            left: 0;
        }
        .carousel-inner > .active.left {
            left: -100%;
        }
        .carousel-inner > .active.right {
            left: 100%;
        }
        .carousel-control {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 15%;
            font-size: 20px;
            color: #fff;
            text-align: center;
            text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
            filter: alpha(opacity=50);
            opacity: .5;
        }
        .carousel-control.left {
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
            background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
            background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001)));
            background-image:         linear-gradient(to right, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
            background-repeat: repeat-x;
        }
        .carousel-control.right {
            right: 0;
            left: auto;
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
            background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
            background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));
            background-image:         linear-gradient(to right, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
            background-repeat: repeat-x;
        }
        .carousel-control:hover,
        .carousel-control:focus {
            color: #fff;
            text-decoration: none;
            filter: alpha(opacity=90);
            outline: 0;
            opacity: .9;
        }
        .carousel-control .icon-prev,
        .carousel-control .icon-next,
        .carousel-control .glyphicon-chevron-left,
        .carousel-control .glyphicon-chevron-right {
            position: absolute;
            top: 50%;
            z-index: 5;
            display: inline-block;
        }
        .carousel-control .icon-prev,
        .carousel-control .glyphicon-chevron-left {
            left: 50%;
            margin-left: -10px;
        }
        .carousel-control .icon-next,
        .carousel-control .glyphicon-chevron-right {
            right: 50%;
            margin-right: -10px;
        }
        .carousel-control .icon-prev,
        .carousel-control .icon-next {
            width: 20px;
            height: 20px;
            margin-top: -10px;
            font-family: serif;
            line-height: 1;
        }
        .carousel-control .icon-prev:before {
            content: '\2039';
        }
        .carousel-control .icon-next:before {
            content: '\203a';
        }
        .carousel-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            z-index: 15;
            width: 60%;
            padding-left: 0;
            margin-left: -30%;
            text-align: center;
            list-style: none;
        }
        .carousel-indicators li {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 1px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #000 \9;
            background-color: rgba(0, 0, 0, 0);
            border: 1px solid #fff;
            border-radius: 10px;
        }
        .carousel-indicators .active {
            width: 12px;
            height: 12px;
            margin: 0;
            background-color: #fff;
        }
        .carousel-caption {
            position: absolute;
            right: 15%;
            bottom: 20px;
            left: 15%;
            z-index: 10;
            padding-top: 20px;
            padding-bottom: 20px;
            color: #fff;
            text-align: center;
            text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
        }
        .carousel-caption .btn {
            text-shadow: none;
        }
        @media screen and (min-width: 768px) {
            .carousel-control .glyphicon-chevron-left,
            .carousel-control .glyphicon-chevron-right,
            .carousel-control .icon-prev,
            .carousel-control .icon-next {
                width: 30px;
                height: 30px;
                margin-top: -15px;
                font-size: 30px;
            }
            .carousel-control .glyphicon-chevron-left,
            .carousel-control .icon-prev {
                margin-left: -15px;
            }
            .carousel-control .glyphicon-chevron-right,
            .carousel-control .icon-next {
                margin-right: -15px;
            }
            .carousel-caption {
                right: 20%;
                left: 20%;
                padding-bottom: 30px;
            }
            .carousel-indicators {
                bottom: 20px;
            }
        }
        .clearfix:before,
        .clearfix:after,
        .dl-horizontal dd:before,
        .dl-horizontal dd:after,
        .container:before,
        .container:after,
        .container-fluid:before,
        .container-fluid:after,
        .row:before,
        .row:after,
        .form-horizontal .form-group:before,
        .form-horizontal .form-group:after,
        .btn-toolbar:before,
        .btn-toolbar:after,
        .btn-group-vertical > .btn-group:before,
        .btn-group-vertical > .btn-group:after,
        .nav:before,
        .nav:after,
        .navbar:before,
        .navbar:after,
        .navbar-header:before,
        .navbar-header:after,
        .navbar-collapse:before,
        .navbar-collapse:after,
        .pager:before,
        .pager:after,
        .panel-body:before,
        .panel-body:after,
        .modal-footer:before,
        .modal-footer:after {
            display: table;
            content: " ";
        }
        .clearfix:after,
        .dl-horizontal dd:after,
        .container:after,
        .container-fluid:after,
        .row:after,
        .form-horizontal .form-group:after,
        .btn-toolbar:after,
        .btn-group-vertical > .btn-group:after,
        .nav:after,
        .navbar:after,
        .navbar-header:after,
        .navbar-collapse:after,
        .pager:after,
        .panel-body:after,
        .modal-footer:after {
            clear: both;
        }
        .center-block {
            display: block;
            margin-right: auto;
            margin-left: auto;
        }
        .pull-right {
            float: right !important;
        }
        .pull-left {
            float: left !important;
        }
        .hide {
            display: none !important;
        }
        .show {
            display: block !important;
        }
        .invisible {
            visibility: hidden;
        }
        .text-hide {
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
        }
        .hidden {
            display: none !important;
        }
        .affix {
            position: fixed;
        }
        @-ms-viewport {
            width: device-width;
        }
        .visible-xs,
        .visible-sm,
        .visible-md,
        .visible-lg {
            display: none !important;
        }
        .visible-xs-block,
        .visible-xs-inline,
        .visible-xs-inline-block,
        .visible-sm-block,
        .visible-sm-inline,
        .visible-sm-inline-block,
        .visible-md-block,
        .visible-md-inline,
        .visible-md-inline-block,
        .visible-lg-block,
        .visible-lg-inline,
        .visible-lg-inline-block {
            display: none !important;
        }
        @media (max-width: 767px) {
            .visible-xs {
                display: block !important;
            }
            table.visible-xs {
                display: table;
            }
            tr.visible-xs {
                display: table-row !important;
            }
            th.visible-xs,
            td.visible-xs {
                display: table-cell !important;
            }
        }
        @media (max-width: 767px) {
            .visible-xs-block {
                display: block !important;
            }
        }
        @media (max-width: 767px) {
            .visible-xs-inline {
                display: inline !important;
            }
        }
        @media (max-width: 767px) {
            .visible-xs-inline-block {
                display: inline-block !important;
            }
        }
        @media (min-width: 768px) and (max-width: 991px) {
            .visible-sm {
                display: block !important;
            }
            table.visible-sm {
                display: table;
            }
            tr.visible-sm {
                display: table-row !important;
            }
            th.visible-sm,
            td.visible-sm {
                display: table-cell !important;
            }
        }
        @media (min-width: 768px) and (max-width: 991px) {
            .visible-sm-block {
                display: block !important;
            }
        }
        @media (min-width: 768px) and (max-width: 991px) {
            .visible-sm-inline {
                display: inline !important;
            }
        }
        @media (min-width: 768px) and (max-width: 991px) {
            .visible-sm-inline-block {
                display: inline-block !important;
            }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
            .visible-md {
                display: block !important;
            }
            table.visible-md {
                display: table;
            }
            tr.visible-md {
                display: table-row !important;
            }
            th.visible-md,
            td.visible-md {
                display: table-cell !important;
            }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
            .visible-md-block {
                display: block !important;
            }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
            .visible-md-inline {
                display: inline !important;
            }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
            .visible-md-inline-block {
                display: inline-block !important;
            }
        }
        @media (min-width: 1200px) {
            .visible-lg {
                display: block !important;
            }
            table.visible-lg {
                display: table;
            }
            tr.visible-lg {
                display: table-row !important;
            }
            th.visible-lg,
            td.visible-lg {
                display: table-cell !important;
            }
        }
        @media (min-width: 1200px) {
            .visible-lg-block {
                display: block !important;
            }
        }
        @media (min-width: 1200px) {
            .visible-lg-inline {
                display: inline !important;
            }
        }
        @media (min-width: 1200px) {
            .visible-lg-inline-block {
                display: inline-block !important;
            }
        }
        @media (max-width: 767px) {
            .hidden-xs {
                display: none !important;
            }
        }
        @media (min-width: 768px) and (max-width: 991px) {
            .hidden-sm {
                display: none !important;
            }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
            .hidden-md {
                display: none !important;
            }
        }
        @media (min-width: 1200px) {
            .hidden-lg {
                display: none !important;
            }
        }
        .visible-print {
            display: none !important;
        }
        @media print {
            .visible-print {
                display: block !important;
            }
            table.visible-print {
                display: table;
            }
            tr.visible-print {
                display: table-row !important;
            }
            th.visible-print,
            td.visible-print {
                display: table-cell !important;
            }
        }
        .visible-print-block {
            display: none !important;
        }
        @media print {
            .visible-print-block {
                display: block !important;
            }
        }
        .visible-print-inline {
            display: none !important;
        }
        @media print {
            .visible-print-inline {
                display: inline !important;
            }
        }
        .visible-print-inline-block {
            display: none !important;
        }
        @media print {
            .visible-print-inline-block {
                display: inline-block !important;
            }
        }
        @media print {
            .hidden-print {
                display: none !important;
            }
        }
        /*# sourceMappingURL=bootstrap.css.map */

        /*--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--*/
        h4, h5, h6,
        h1, h2, h3 {margin: 0;}
        ul, ol {margin: 0;}
        p {margin: 0;}
        html, body{
            font-family: 'Work Sans', sans-serif;
            font-size: 100%;
            background:#fff;
        }
        a {
            text-decoration: none;
        }
        a:hover {
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
            text-decoration:none;
        }
        .fixed{
            position: fixed;
            top: 0;
            width:87%;
            margin: 0 auto;
            z-index: 1;
            background:#fff;
        }
        /*--header main start here--*/
        .page-container {
            min-width: 1260px;
            position: relative;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            margin: 0px auto;
        }
        .left-content {
            float: right;
            width: 86.5%;
        }
        .page-container.sidebar-collapsed {
            transition: all 100ms linear;
            transition-delay: 300ms;

        }
        .page-container.sidebar-collapsed .left-content {
            float: right;
            width: 96%;
        }
        .page-container.sidebar-collapsed-back {
            transition: all 100ms linear;
        }
        .page-container.sidebar-collapsed-back .left-content {
            transition: all 100ms linear;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            transition: all 0.3s ease;
            float: right;
            width:86%;
        }
        .page-container.sidebar-collapsed .sidebar-menu {
            width: 65px;
            transition: all 100ms ease-in-out;
            transition-delay: 300ms;
        }

        .page-container.sidebar-collapsed-back .sidebar-menu {
            width: 230px;
            transition: all 100ms ease-in-out;
        }

        .page-container.sidebar-collapsed .sidebar-icon {
            transition: all 300ms ease-in-out;
            color: #fff;
            background:#005199;

        }
        .page-container.sidebar-collapsed .logo {
            box-sizing: border-box;
            transition: all 100ms ease-in-out;
            transition-delay: 300ms;
            left: 18px;

        }
        .page-container.sidebar-collapsed-back .logo {
            width: 100%;
            height:60px;
            box-sizing: border-box;
            transition: all 100ms ease-in-out;
        }

        .page-container.sidebar-collapsed #logo {
            /*  opacity: 0;*/
            transition: all 200ms ease-in-out;
            /*    display: none;*/
        }
        .page-container.sidebar-collapsed .down {
            display: none;
        }
        .page-container.sidebar-collapsed-back #logo {
            opacity: 1;
            transition: all 200ms ease-in-out;
            transition-delay: 300ms;
        }

        .page-container.sidebar-collapsed #menu span {
            opacity: 0;
            transition: all 50ms linear;

        }

        .page-container.sidebar-collapsed-back #menu span {
            opacity: 1;
            transition: all 200ms linear;
            transition-delay: 300ms;
        }
        .no_profile_details{
            float:  right;
            margin: 3% 5% 0 0;
        }
        .no_profile_details span{
            font-size: 20px;
        }
        .sidebar-menu {
            position: absolute;
            float: left;
            width: 220px;
            top: 0px;
            left:0px;
            bottom: 0;
            background-color:#202121;
            color: #aaabae;
            z-index: 999;
        }
        #menu {
            list-style: none;
            margin: 0;
            padding: 0;
            margin-bottom: 20px;
        }
        #menu li {
            position: relative;
            margin: 0;
            font-size: 12px;
            padding: 0;
        }
        #menu li ul {
            opacity: 0;
            height: 0px;
        }
        #menu li a {
            position: relative;
            display: block;
            padding: 13px 20px;
            color: #FFFFFF;
            white-space: nowrap;
            z-index: 2;
            font-size: 1.12em;
            text-align: center;
            font-family: 'Carrois Gothic', sans-serif;
        }
        #menu li a:hover {
            color:#f0c808;
            transition: color 250ms ease-in-out, background-color 250ms ease-in-out;
        }
        #menu li.active > a {
            background-color: #2b303a;
            color: #ffffff;
        }
        #menu ul li { background-color:#202121; }
        #menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        #menu li ul {
            position: absolute;
            visibility: hidden;
            left: 100%;
            top: 20px;
            background-color: #2b303a;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.1s linear;
            border-top: 1px solid rgba(69, 74, 84, 0.7);
        }
        .no_profile_details span a {
            color: #0060B6;
            text-decoration: none;
        }

        .no_profile_details span a:hover
        {
            color:#00A0C6;
            text-decoration:none;
            cursor:pointer;
        }

        #menu li:hover > ul {
            visibility: visible;
            opacity: 1;
        }
        #menu li li ul {
            right: 100%;
            visibility: hidden;
            top: -1px;
            opacity: 0;
            transition: opacity 0.1s linear;
        }
        #menu li li:hover ul {
            visibility: visible;
            opacity: 1;
        }
        #menu .fa {
            margin-bottom: 10px;
            font-size: 1.5em;
            display: block;
        }
        .menu {
            padding:4.2em 0em 0em 0em;
        }
        /*----*/
        .page-container.sidebar-collapsed .left-content .fixed {
            width: 97%;
        }
        /*----*/
        .logo {
            width:22%;
            box-sizing: border-box;
            position: absolute;
            top: 20px;
            left: 170px;
        }
        .sidebar-icon {
            position: relative;
            float: left;
            text-align: center;
            line-height: 1;
            font-size: 18px;
            padding: 6px 8px;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius:3px;
            -o-border-radius:3px;
            color: #FFF;
            background-clip: padding-box;
            background: #005199;
        }
        .sidebar-icon:hover{
            color: #FFF;
        }
        .fa-html5 {
            color: #fff;
            margin-left: 50px;
        }
        /*--nav strip start here--*/
        .header-main {
            background:#fff;
            padding: 1em 2em;
            box-shadow: 0 1px 3px rgba(0,0,0,0.15);
        }
        .header-right {
            float: right;
            width: 50%;
        }
        .header-left {
            float: left;
            width: 45%;
        }
        .logo-name {
            float: left;
            width: 30%;
            margin: 1.5% 3% 0% 2%;
        }
        .logo-name h1 {
            font-size: 2.5em;
            color: #5299d3;
            margin: 0em;
            font-weight: 700;
            text-decoration: none;
        }
        .logo-name  h1 a{
            color: #910048;
        }
        .logo-name a {
            display:inline-block;
        }
        .nav > li > a:hover, .nav > li > a:focus {
            background: none !important;
        }
        span.logo-clr{
            color:#fdbb30;
        }
        .page-container.sidebar-collapsed-back #menu span.fa.fa-angle-right{
            position: absolute;
            top: 0px;
            right: 20px;
        }
        /*start search*/
        .search-box {
            float: left;
            width:40%;
            margin-top: 0.5em;
            margin-left: 10px;
            position: relative;
            z-index: 1;
            display: inline-block;
            border:2px solid rgb(197, 197, 197);
        }
        .search-box input[type="text"] {
            outline: none;
            background: #fff;
            width: 86%;
            margin: 0;
            z-index: 10;
            font-size: 0.9em;
            color: #7A7B78;
            padding: 0.5em 0.5em;
            border: none;
            -webkit-appearance: none;
            display: inline-block;
        }
        .search-box input[type="submit"] {
            background: url(../images/search.png)no-repeat;
            width: 20px;
            height: 20px;
            display: inline-block;
            vertical-align: text-top;
            border: none;
            outline: none;
        }
        ::-webkit-input-placeholder{
            color:#7A7B78 !important;
        }
        /*--//search-ends --*/
        /*--- Progress Bar ----*/
        .meter {
            position: relative;
        }
        .meter > span {
            display: block;
            height: 100%;

            position: relative;
            overflow: hidden;
        }
        .meter > span:after, .animate > span > span {
            content: "";
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;

            overflow: hidden;
        }

        .animate > span:after {
            display: none;
        }

        @-webkit-keyframes move {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 50px 50px;
            }
        }

        @-moz-keyframes move {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 50px 50px;
            }
        }

        .red > span {
            background-color: #65CEA7;
        }

        .nostripes > span > span, .nostripes > span:after {
            -webkit-animation: none;
            -moz-animation: none;
            background-image: none;
        }
        /*--- User Panel---*/
        .profile_details_left {
            float: left;
            width: 50%;
        }
        .dropdown-menu {
            box-shadow: 2px 3px 4px rgba(0, 0, 0, .175);
            -webkit-box-shadow: 2px 3px 4px rgba(0, 0, 0, .175);
            -moz-box-shadow: 2px 3px 4px rgba(0, 0, 0, .175);
            border-radius: 0;
        }
        li.dropdown.head-dpdn {
            display: inline-block;
            padding: 1em 0;
            float: left;
        }
        li.dropdown.head-dpdn a.dropdown-toggle {
            margin: 1em 2em;
        }
        ul.dropdown-menu li {
            margin-left: 0;
            width: 100%;
            padding: 0;
            background: #fff;
        }
        .user-panel-top ul{
            padding-left:0;
        }
        .user-panel-top li{
            float:left;
            margin-left:15px;
            position:relative;
        }
        .user-panel-top li span.digit{
            font-size:11px;
            font-weight:bold;
            color:#FFF;
            background:#e64c65;
            line-height:20px;
            width:20px;
            height:20px;
            border-radius:2em;
            -webkit-border-radius:2em;
            -moz-border-radius:2em;
            -o-border-radius:2em;
            text-align:center;
            display: inline-block;
            position: absolute;
            top: -3px;
            right: -10px;
        }
        .user-panel-top li:first-child{
            margin-left:0;
        }
        .sidebar .nav-second-level li a.active ,.sidebar ul li a.active{
            color: #F2B33F;
        }
        li.active a i, .act a i {
            color: #F2B33F;
        }
        .custom-nav > li.act > a, .custom-nav > li.act > a:hover, .custom-nav > li.act > a:focus {
            background-color: #353f4f;
            color:#8BC34A;
        }
        .user-panel-top li a{
            display: block;
            padding: 5px;
            text-decoration:none;
        }
        .header-right i.fa.fa-envelope{
            color:#6F6F6F;
        }
        i.fa.fa-bell{
            color:#6F6F6F;
        }
        i.fa.fa-tasks{
            color:#6F6F6F;
        }
        .user-panel-top li a:hover{
            border-color:rgba(101, 124, 153, 0.93);
        }
        .user-panel-top li a i{
            width:24px;
            height:24px;
            display: block;
            text-align:center;
            line-height:25px;
        }
        .user-panel-top li a i span{
            font-size:15px;
            color:#FFF;
        }
        .user-panel-top li a.user{
            background:#667686;
        }
        .user-panel-top li span.green{
            background:#a88add;
        }
        .user-panel-top li span.red{
            background:#b8c9f1;
        }
        .user-panel-top li span.yellow{
            background:#bdc3c7;
        }
        /***** Messages *************/
        .notification_header{
            background-color:#FAFAFA;
            padding: 10px 15px;
            border-bottom:1px solid rgba(0, 0, 0, 0.05);
            margin-bottom: 8px;
        }
        .notification_header h3{
            color:#6A6A6A;
            font-size:12px;
            font-weight:600;
            margin:0;
        }
        .notification_bottom {
            background-color:rgba(93, 90, 88, 0.07);
            padding: 4px 0;
            text-align: center;
            margin-top: 5px;
        }
        .notification_bottom a {
            color: #6F6F6F;
            font-size: 1em;
        }
        .notification_bottom a:hover {
            color:#6164C1;
        }
        .notification_bottom h3 a{
            color: #717171;
            font-size:12px;
            border-radius:0;
            border:none;
            padding:0;
            text-align:center;
        }
        .notification_bottom h3 a:hover{
            color:#4A4A4A;
            text-decoration:underline;
            background:none;
        }
        .user_img{
            float:left;
            width:19%;
        }
        .user_img img{
            max-width:100%;
            display:block;
            border-radius:2em;
            -webkit-border-radius:2em;
            -moz-border-radius:2em;
            -o-border-radius:2em;
        }
        .notification_desc{
            float:left;
            width:70%;
            margin-left:5%;
        }
        .notification_desc p{
            color:#757575;
            font-size:13px;
            padding:2px 0;
        }
        .wrapper-dropdown-2 .dropdown li a:hover .notification_desc p{
            color:#424242;
        }
        .notification_desc p span{
            color:#979797 !important;
            font-size:11px;
        }
        /*---bages---*/
        .header-right span.badge {
            font-size: 10px;
            font-weight: bold;
            color: #FFF;
            background:#FC8213;
            line-height: 10px;
            width: 15px;
            height: 15px;
            border-radius: 2em;
            -webkit-border-radius: 2em;
            -moz-border-radius: 2em;
            -o-border-radius: 2em;
            text-align: center;
            display: inline-block;
            position: absolute;
            top: 20%;
            padding: 2px 0 0;
            left: 54%;
        }
        .header-right span.blue{
            background-color:#337AB7;
        }
        .header-right span.red{
            background-color:#ef553a;
        }
        .header-right span.blue1{
            background-color:#68AE00;
        }
        i.icon_1{
            float: left;
            color: #00aced;
            line-height: 2em;
            margin-right: 1em;
        }
        i.icon_2{
            float: left;
            color:#ef553a;
            line-height: 2em;
            margin-right: 1em;
            font-size: 20px;
        }
        i.icon_3{
            float: left;
            color:#9358ac;
            line-height: 2em;
            margin-right: 1em;
            font-size: 20px;
        }
        .avatar_left {
            float: left;
        }
        i.icon_4{
            width: 45px;
            height: 45px;
            background: #F44336;
            float: left;
            color: #fff;
            text-align: center;
            font-size: 1.5em;
            line-height: 44px;
            font-style: normal;
            margin-right: 1em;
        }
        i.icon_5{
            background-color: #3949ab;
        }
        i.icon_6{
            background-color: #03a9f4;
        }
        .blue-text {
            color: #2196F3 !important;
            float:right;
        }
        /*---//bages---*/
        /*--Progress bars--*/
        .progress {
            height: 10px;
            margin: 7px 0;
            overflow: hidden;
            background: #e1e1e1;
            z-index: 1;
            cursor: pointer;
        }
        .task-info .percentage{
            float:right;
            height:inherit;
            line-height:inherit;
        }
        .task-desc{
            font-size:12px;
        }
        .wrapper-dropdown-3 .dropdown li a:hover span.task-desc {
            color:#65cea7;
        }
        .progress .bar {
            z-index: 2;
            height:15px;
            font-size: 12px;
            color: white;
            text-align: center;
            float:left;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            -ms-box-sizing: content-box;
            box-sizing: content-box;
            -webkit-transition: width 0.6s ease;
            -moz-transition: width 0.6s ease;
            -o-transition: width 0.6s ease;
            transition: width 0.6s ease;
        }
        .progress-striped .yellow{
            background:#f0ad4e;
        }
        .progress-striped .green{
            background:#5cb85c;
        }
        .progress-striped .light-blue{
            background:#4F52BA;
        }
        .progress-striped .red{
            background:#d9534f;
        }
        .progress-striped .blue{
            background:#428bca;
        }
        .progress-striped .orange {
            background:#e94e02;
        }
        .progress-striped .bar {
            background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
            background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
            background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
            background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
            -webkit-background-size: 40px 40px;
            -moz-background-size: 40px 40px;
            -o-background-size: 40px 40px;
            background-size: 40px 40px;
        }
        .progress.active .bar {
            -webkit-animation: progress-bar-stripes 2s linear infinite;
            -moz-animation: progress-bar-stripes 2s linear infinite;
            -ms-animation: progress-bar-stripes 2s linear infinite;
            -o-animation: progress-bar-stripes 2s linear infinite;
            animation: progress-bar-stripes 2s linear infinite;
        }
        @-webkit-keyframes progress-bar-stripes {
            from {
                background-position: 40px 0;
            }
            to {
                background-position: 0 0;
            }
        }
        @-moz-keyframes progress-bar-stripes {
            from {
                background-position: 40px 0;
            }
            to {
                background-position: 0 0;
            }
        }
        @-ms-keyframes progress-bar-stripes {
        from {
            background-position: 40px 0;
        }
        to {
            background-position: 0 0;
        }
        }
        @-o-keyframes progress-bar-stripes {
            from {
                background-position: 0 0;
            }
            to {
                background-position: 40px 0;
            }
        }
        @keyframes progress-bar-stripes {
            from {
                background-position: 40px 0;
            }
            to {
                background-position: 0 0;
            }
        }
        /*--Progress bars--*/
        /********* profile details **********/
        ul.dropdown-menu.drp-mnu i.fa {
            margin-right: 0.5em;
        }
        ul.dropdown-menu {
            padding: 0;
            min-width: 230px;
            top:101%;
        }
        .dropdown-menu > li > a {
            padding: 3px 15px;
            font-size: 1em;
        }
        .profile_details {
            float: right;
        }
        .profile_details_drop .fa.fa-angle-up{
            display:none;
        }
        .profile_details_drop.open .fa.fa-angle-up{
            display:block;
        }
        .profile_details_drop.open .fa.fa-angle-down{
            display:none;
        }
        .profile_details_drop a.dropdown-toggle {
            display:block;
            padding:0em 3em 0 1em;
        }
        .profile_img span.prfil-img{
            float:left;
        }
        .user-name{
            float:left;
            margin-top:7px;
            margin-left:11px;
            height:35px;
        }
        .profile_details ul li{
            list-style-type:none;
            position:relative;
        }
        .profile_details li a i.fa.lnr {
            position: absolute;
            top: 34%;
            right: 8%;
            color: #68AE00;
            font-size: 1.6em;
        }
        .profile_details ul li ul.dropdown-menu.drp-mnu {
            padding: 1em;
            min-width: 190px;
            top: 122%;
            left:0%;
        }
        ul.dropdown-menu.drp-mnu li {
            list-style-type: none;
            padding: 3px 0;
        }
        .user-name p{
            font-size:1em;
            color:#5299d3;
            line-height:1em;
            font-weight:700;
        }
        .user-name span {
            font-size: .75em;
            font-style: italic;
            color: #424f63;
            font-weight: normal;
            margin-top: .3em;
        }
        .profile_details ul {
            padding: 0px;
        }
        /*--header strip end here-*/
        /*inner-block--*/
        .inner-block {
            padding: 8em 2em 4em 2em;
            background: #fafafa;
        }
        .market-update-block {
            padding: 2em 2em;
            background: #999;
        }
        .market-update-block h3 {
            color: #fff;
            font-size: 2.5em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .market-update-block h4 {
            font-size: 1.2em;
            color: #fff;
            margin: 0.3em 0em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .market-update-block p {
            color: #fff;
            font-size: 0.8em;
            line-height: 1.8em;
        }
        .market-update-block.clr-block-1 {
            background: #68ae00;
            margin-right: 0.8em;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .market-update-block.clr-block-2 {
            background:#FC8213;
            margin-right: 0.8em;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .market-update-block.clr-block-3 {
            background:#337AB7;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .market-update-block.clr-block-1:hover {
            background: #3C3C3C;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .market-update-block.clr-block-2:hover {
            background: #3C3C3C;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .market-update-block.clr-block-3:hover {
            background:#3C3C3C;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .market-update-right i.fa.fa-file-text-o {
            font-size: 3em;
            color:#68AE00;
            width: 80px;
            height: 80px;
            background: #fff;
            text-align: center;
            border-radius: 49px;
            -webkit-border-radius: 49px;
            -moz-border-radius:49px;
            -o-border-radius:49px;
            line-height: 1.7em;
        }
        .market-update-right i.fa.fa-eye {
            font-size: 3em;
            color:#FC8213;
            width: 80px;
            height: 80px;
            background: #fff;
            text-align: center;
            border-radius: 49px;
            -webkit-border-radius: 49px;
            -moz-border-radius:49px;
            -o-border-radius:49px;
            line-height: 1.7em;
        }
        .market-update-right i.fa.fa-envelope-o {
            font-size:3em;
            color:#337AB7;
            width: 80px;
            height: 80px;
            background: #fff;
            text-align: center;
            border-radius: 49px;
            -webkit-border-radius: 49px;
            -moz-border-radius:49px;
            -o-border-radius:49px;
            line-height: 1.7em;
        }
        .market-update-left {
            padding: 0px;
        }
        /*--main page charts strat here--*/
        /*--chart layer-1 left--*/

        .glocy-chart {
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
            padding: 2em 1em;
            background: #fff;
        }
        .prograc-blocks {
            padding:2.2em 2em;
            background: #fff;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        canvas#bar {
            width: 584px !important;
            height: 300px !important;
        }
        h3.tlt {
            font-size: 1.3em;
            margin-bottom: 0.8em;
            font-weight: 700;
            color: #5F5D5D;
            text-transform: uppercase;
            font-family: 'Carrois Gothic', sans-serif;
        }
        /*--chart-layer1-right start--*/
        .home-progres-main {
            padding-bottom: 9px;
            margin: 0px 0 20px;
        }
        .home-progres-main h3 {
            font-size: 1.3em;
            font-weight: 700;
            color: #5F5D5D;
            text-transform: uppercase;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .home-progress {
            height: 21px;
            margin: 20px 0;
            overflow: hidden;
            background: #e1e1e1;
            z-index: 1;
            cursor: pointer;
            border-radius: 4px;
        }
        .progress-bar1 {
            float: left;
            width: 0;
            height: 100%;
            font-size: 12px;
            line-height: 20px;
            color: #fff;
            text-align: center;
            background-color: #337ab7;
            -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
            -webkit-transition: width .6s ease;
            -o-transition: width .6s ease;
            transition: width .6s ease;
        }
        /*--moveing effect prograce bars--*/
        .bar_group__bar.thin::before{
            display: block;
            content: '';
            position: absolute;
            z-index: -1;
        }

        .bar_group__bar.thin::before {
            width: 100%;
            height: 5px;
            border-radius: 0px;
            background: #E4E4E4;
        }

        .bar_group__bar.thin {
            width: 0%;
            height: 5px;
            border-radius: 0px;
            background: #90B82D;
            margin-bottom: 10px;
            -webkit-transition: width 1s;
            transition: width 1s;
        }
        .b_label,.bar_label_min,.bar_label_max,.b_tooltip span {
            color: #999;
            font-size: 14px;
            margin: .5em 0;
        }
        .bar_group.group_ident-1 {
            padding-right: 0em;
            z-index: 0;
            position: relative;
        }
        .bar_label_max {
            position: absolute;
            right:0%;
        }
        .bar_label_min {
            position: absolute;
        }
        .b_tooltip {
            -webkit-transition: all 1s;
            transition: all 1s;
            position: relative;
            float: left;
            left: 100%;
            padding: 4px 10px 7px 10px;
            background-color:rgb(74, 74, 73);
            -webkit-transform: translateX(-50%) translateY(-30px);
            -ms-transform: translateX(-50%) translateY(-30px);
            transform: translateX(-50%) translateY(-30px);
            -o-transform: translateX(-50%) translateY(-30px);
            border-radius:0px;
            line-height: 11px;
        }
        .b_tooltip span {
            color: white;
        }
        .b_tooltip--tri {
            width: 0;
            height: 0;
            position: absolute;
            content: '';
            bottom: -5px;
            left: 0;
            right: 0;
            margin: auto;
            display: block;
            border-style: solid;
            border-width: 5px 5px 0 5px;
            border-color: rgb(74, 74, 73) transparent transparent transparent;
        }
        /*--chartlayer 2 start here--*/
        .chart-layer-2 {
            margin: 2em 0em;
        }
        .chart-layer2-left h3 {
            font-size: 1.3em;
            font-weight: 700;
            color: #5F5D5D;
            text-align: left;
            text-transform: uppercase;
            font-family: 'Carrois Gothic', sans-serif;
        }
        canvas#radar {
            width: 565px !important;
            height:350px !important;
        }
        /*--maloum grid start here--*/
        .malorum-top {
            background: url(../images/1.jpg)no-repeat;
            background-size: cover;
            min-height:190px;
        }
        .malorm-bottom {
            padding:1.5em 2em;
            position:relative;
            background: #fff;
        }
        span.malorum-pro {
            background: url(../images/b3.png)no-repeat;
            width: 95px;
            height: 95px;
            display: inline-block;
            position: absolute;
            top: -60px;
            left: 265px;
            border: 2px solid #ccc;
            border-radius: 63px;
            -webkit-border-radius:63px;
            -moz-border-radius: 63px;
            -o-border-radius: 63px;
        }
        .malorm-bottom h2 {
            font-size: 1.5em;
            color:#68AE00;
            text-align: center;
            margin-bottom: 0.5em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .malorm-bottom h4 {
            font-size: 1em;
            margin: 0.5em 0em;
            color:#FC8213;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .malorm-bottom p {
            font-size: 1em;
            color: #000;
            line-height: 1.8em;
            text-align: center;
            width: 70%;
            margin: 0 auto;
        }
        .user-marorm {
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .malorm-bottom ul {
            list-style: none;
            padding: 0px;
            text-align: center;
            margin-top: 1em;
        }
        .malorm-bottom ul li {
            display: inline-block;
            margin-right: 10px;
        }
        .malorm-bottom i.fa.fa-facebook {
            font-size: 1em;
            color: #fff;
            background: #3c579e;
            width: 30px;
            height: 30px;
            line-height: 2em;
            transition: 0.5s all;
        }
        .malorm-bottom i.fa.fa-facebook:hover{
            border-radius: 35px;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .malorm-bottom i.fa.fa-twitter{
            font-size: 1em;
            color: #fff;
            background:#0f98ce;
            width: 30px;
            height: 30px;
            line-height: 2em;
            transition: 0.5s all;
        }
        .malorm-bottom i.fa.fa-twitter:hover{
            border-radius: 35px;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .malorm-bottom i.fa.fa-google-plus{
            font-size: 1em;
            color: #fff;
            background: #ca2429;
            width: 30px;
            height: 30px;
            line-height: 2em;
            transition: 0.5s all;
        }
        .malorm-bottom i.fa.fa-google-plus:hover{
            border-radius: 35px;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }

        .malorum-icons li a{
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            text-decoration: none;
            -webkit-transition: all .15s ease;
            transition: all .15s ease;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .malorum-icons a:hover .tooltip {
            display: block;
            visibility: visible;
            opacity: 1;
            -webkit-transform: translate(0, -10px);
            transform: translate(0, -10px);
        }
        .malorum-icons a:active {
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.5) inset;
        }
        .malorum-icons .tooltip {
            opacity: 0;
            position: absolute;
            top: -20px;
            left: 50%;
            -webkit-transition: all .15s ease;
            transition: all .15s ease;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .malorum-icons .tooltip span {
            position: relative;
            left: -50%;
            padding: 6px 8px 5px 8px;
            border-radius: 3px;
            color: #fff;
            font-size: 0.7em;
            line-height: 1;
            background: #565656;
            color: #fff;
            letter-spacing: 0.5px;
        }
        .malorum-icons .tooltip span:after {
            position: absolute;
            content: " ";
            width: 0;
            height: 0;
            top: 100%;
            left: 50%;
            margin-left: -8px;
            border: 8px solid transparent;
            border-top-color: #565656;
        }
        .malorum-icons i {
            position: relative;
            top: 1px;
            font-size: 1.5rem;
        }
        /*--chit chart layer start here--*/
        .panel {
            padding: 1em 1em;
            margin-bottom:0px;
            background: none;
            box-shadow: none;
        }
        .chit-chat-layer1 {
            margin:2em  0em;
        }
        .chit-chat-heading {
            font-size: 1.2em;
            font-weight: 700;
            color: #5F5D5D;
            text-transform: uppercase;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .work-progres {
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
            padding: 1.34em 1em;
            background: #fff;
        }
        /*--geochart start here--*/
        section#charts1 {
            padding: 0px;
        }
        .geo-chart {
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
            padding: 1em 1em;
            background: #fff;
        }
        .revenue {
            padding: 1em;
            background: #fff;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        div#geoChart {
            width: 100% !important;
            height: 305px!important;
            border: 4px solid #fff;
        }
        h3#geoChartTitle {
            font-size: 1.3em;
            font-weight: 700;
            color: #5F5D5D;
            text-transform: uppercase;
            font-family: 'Carrois Gothic', sans-serif;
        }
        /*--climate start here--*/
        .climate-grid1 {
            background: url(../images/climate.jpg)no-repeat;
            min-height:375px;
            background-size: cover;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .climate-gd1top-left h4 {
            font-size: 1.2em;
            color: #fff;
            margin-bottom: 0.5em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .climate-gd1top-left h3 {
            font-size: 2em;
            color:#FC8213;
            margin-bottom: 0.5em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .climate-gd1top-left p {
            font-size: 1em;
            color: #fff;
            line-height: 2em;
        }
        .climate-gd1top-right{
            font-size: 1em;
            color: #fff;
            line-height: 2em;
        }
        .climate-gd1-top {
            padding: 1em 1em;
            margin-bottom:1.6em;
        }
        .climate-gd1-bottom {
            padding: 1em 0em;
            background:rgba(252, 130, 19, 0.86);
        }
        .cloudy1 h4 {
            font-size: 1em;
            color: #fff;
            margin-bottom: 0.5em;
        }
        .cloudy1 {
            text-align: center;
        }
        i.fa.fa-cloud {
            color: #fff;
            font-size: 2.5em;
            margin: 0.2em 0em 0.2em 0em;
        }
        .cloudy1 h3 {
            font-size: 1.2em;
            color: #fff;
        }
        span.timein-pms {
            font-size: 0.4em;
            vertical-align: top;
            color: #fff;
        }
        span.clime-icon {
            display: block;
            margin-bottom: 0.3em;
        }
        .climate-grid2 {
            background: url(../images/shoppy.jpg)no-repeat bottom;
            min-height:310px;
            background-size: cover;
            position:relative;
        }
        .shoppy {
            padding: 1.4em 1em;
            background: #fff;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .climate-grid2 ul {
            position: absolute;
            bottom: -10px;
            right: 0px;
            list-style: none;
        }
        .climate-grid2 ul li {
            display: inline-block;
            margin-right: 0.5em;
        }
        .climate-grid2 ul li i.fa.fa-credit-card {
            width: 35px;
            height: 30px;
            display: inline-block;
            background: #337AB7;
            font-size: 1em;
            color: #FFFFFF;
            line-height: 2em;
            text-align: center;
            border-radius: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius:4px;
            -o-border-radius:4px;
        }
        .climate-grid2 ul li i.fa.fa-credit-card:hover {
            background: #ec8526;
        }
        .climate-grid2 ul li i.fa.fa-usd {
            width: 35px;
            height: 30px;
            display: inline-block;
            background: #337AB7;
            font-size: 1em;
            color: #fff;
            line-height: 2em;
            text-align: center;
            border-radius: 4px;
        }
        .climate-grid2 ul li i.fa.fa-usd:hover {
            background: #ec8526;
        }
        span.shoppy-rate {
            background:#FC8213;
            margin: 1em 1em;
            width: 70px;
            height:70px;
            text-align: center;
            border-radius: 49px;
            -webkit-border-radius: 49px;
            -moz-border-radius:49px;
            -o-border-radius:49px;
            display: inline-block;
        }
        span.shoppy-rate h4 {
            font-size: 1.2em;
            line-height: 3.5em;
            color: #fff;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .shoppy h3 {
            font-size: 1.2em;
            color: #68AE00;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .popular-brand {
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .popular-bran-right {
            background:#FC8213;
            padding: 3em 1em;
        }
        .popular-bran-left {
            background: #fff;
            padding: 2em 1em;
        }
        .popular-bran-left h3 {
            font-size: 1.2em;
            color:#68AE00;
            margin-bottom: 0.2em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .popular-bran-left h4 {
            font-size: 0.9em;
            color:#FC8213;
        }
        .popular-bran-right h3 {
            font-size: 1.3em;
            color: #fff;
            text-align: center;
        }
        .popular-bran-right h3 {
            font-size: 1.55em;
            color: #fff;
            width: 77px;
            height: 77px;
            margin: 0 auto;
            line-height: 2.8em;
            border-radius: 62px;
            -webkit-border-radius: 62px;
            -moz-border-radius:62px;
            -o-border-radius:62px;
            border: 3px solid #fff;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .popular-follo-left {
            background: #FDBB30;
        }
        .popular-follow {
            margin-top:2.35em;
            background: #fff;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .popular-follo-right {
            padding: 3em 1em;
            text-align: center;
        }
        .popular-follo-left {
            background:#68AE00;
            padding: 2.5em 1em;
        }
        .popular-follo-left p {
            font-size: 1em;
            color: #fff;
            line-height: 1.8em;
        }
        .popular-follo-right h4 {
            font-size: 1.5em;
            color:#FC8213;
            margin-bottom: 0.3em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .popular-follo-right h5 {
            font-size: 1em;
            color:#68AE00;
        }
        .popular-bran-left p {
            font-size: 1em;
            color: #000;
            margin-top: 1.3em;
            line-height: 1.5em;
        }
        .climate-gd1top-right p {
            font-size: 1em;
            color: #fff;
        }
        /*--climate end here--*/
        #style-2::-webkit-scrollbar-thumb
        {

            background-color:#000;
        }
        /*--copyrights start here--*/
        .copyrights {
            padding: 1.5em 1em;
            text-align: center;
            bottom:0;
            width:100%;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .copyrights p {
            font-size: 1em;
            color: #000;
        }
        .copyrights p a{
            color: #000;
        }
        .copyrights p a:hover{
            color:#68AE00;
        }
        /*--grids start here--*/
        .cols-grids h2 {
            font-size: 2em;
            color: #68AE00;
            margin-bottom: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        /*-- grids --*/
        .mb40 {
            margin-bottom: 40px !important;
        }
        .demo-grid {
            background: #FFF;
            border: 1px solid #d9d9d9;
            padding: 10px 0;
        }
        code {
            padding: 0;
            background: none;
            color: #B7B7B7;
        }
        .mb40:nth-child(9){
            margin-bottom:0 !important;
        }
        .cols-grids {
            padding: 1em 1em;
            margin-bottom: 0px;
            background: none;
            box-shadow: none;
        }
        /*--portlet start here--*/
        .portlet-grid {
            padding: 0px;
            width: 32%;
            float: left;
            margin: 0% 1% 3% 0%;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.18);
            border-radius: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius:4px;
            -o-border-radius:4px;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .panel-body {
            padding: 25px;
            font-size: 1em;
        }
        .portlet-grid-page h2 {
            font-size: 2em;
            color:#68AE00;
            margin-bottom: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        /*--portlet end here--*/
        /*--button start here--*/
        .btn-effcts.panel-widget {
            padding: 1em;
            margin-top: 2em;
            background: #fff;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .btn-main-heading h2 {
            font-size: 2em;
            color: #68AE00;
            margin-bottom: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .button-heading h4 {
            font-size: 1.8em;
            color:#337AB7;
            margin-bottom: 0.5em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        /*--button end here--*/
        /*--icons --*/
        .boost-icons-head h2 {
            font-size: 2em;
            color: #68AE00;
            margin-bottom: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .boost-icons-list ul {
            list-style: none;
            padding: 0px;
        }
        .boost-icons-list ul li {
            float: left;
            width: 19%;
            font-size: 1em;
            margin: 0% 1% 1% 0%;
            padding: 3em 0.5em;
            text-align: center;
            background: #FFFFFF;
            color:#000;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        i.glyphicon {
            display: block;
            text-align: center;
            margin-bottom: 0.5em;
            font-size: 1.5em;
            color:#337AB7;
        }
        /*--//icons--*/
        /*--typography--*/
        .typography {
            font-family: 'Carrois Gothic', sans-serif;
        }
        p.grid1 {
            margin-bottom: 1em;
        }
        .typography .progress {
            height: 20px;
            margin: 20px 0;
        }
        .page-header {
            padding-bottom: 9px;
            margin: 19px 0 12px;
            border: none;
        }
        .grid_3.grid_4 {
            background: #fff;
            padding: 1em 2em;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .typo-buttons {
            background: #fff;
            padding: 1em 2em;
            box-shadow: -1px 0px 2px 1px rgba(0,0,0,0.15);
            margin: 2em 0em;
        }
        .typo-alerts {
            background: #fff;
            padding: 1em 2em;
            box-shadow: -1px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .typo-progresses {
            background: #fff;
            padding: 1em 2em;
            margin: 2em 0em;
            box-shadow: -1px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .typo-wells {
            background: #fff;
            padding: 1em 2em;
            margin-bottom: 2em;
            box-shadow: -1px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .typo-badges {
            background: #fff;
            padding: 1em 2em;
            box-shadow: -1px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .page-header h3 {
            font-size: 2em;
        }
        .typo-wells h3 {
            font-size: 2em;
            margin-bottom: 1em;
        }
        .typo-badges h3 {
            font-size: 2em;
            margin-bottom: 1em;
        }
        .col-lg-6.mb-60 .nav-tabs > li > a {
            background:#ECEAEA;
            color: #565555;
        }
        .tab-content {
            padding: 1em;
        }
        .tab-content p {
            font-size: 1em;
            color: #000;
            line-height: 1.8em;
        }
        .col-lg-6.mb-60 h4 {
            font-size: 2em;
            margin-bottom: 0.5em;
        }
        /*--login page--*/
        .login-main {
            width: 40%;
            margin: 0 auto;
            background: #FFFFFF;
            background-size: cover;
            min-height: 400px;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .login-page {
            padding: 6.5em 0em;
        }
        .login-head {
            background: url(../images/intro-bg.jpg) no-repeat;
            background-size: cover;
            min-height: 100px;
        }
        .login-head h1 {
            font-size:3em;
            color:#FFF;
            padding: em 0em 0em 0em;
            text-align: center;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .login-block {
            padding: 4em 2em;
        }
        .login-block input[type="text"], .login-block input[type="password"] {
            font-size: 0.9em;
            padding: 10px 20px;
            width: 100%;
            color:#8C8C8C;
            outline: none;
            border: 1px solid #D3D3D3;
            border-radius: 5px;
            -ms-border-radius: 5px;
            -moz-border-radius: 5px;
            -o-border-radius: 5px;
            background:#F5F5F5;
            margin: 0em 0em 1.5em 0em;
        }
        .login-block input[type="submit"] {
            border: none;
            outline: none;
            cursor: pointer;
            color: #fff;
            background: #337AB7;
            width: 100%;
            margin: 0 auto;
            border-radius: 3px;
            padding: 0.5em 1em;
            font-size: 1em;
            display: block;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .login-block input[type="submit"]:hover{
            background:#68AE00;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all ;
            -ms-transition: 0.5s all;
        }
        .forgot-top-grids {
            margin: 1em 0em;
            padding:0em 1.5em
        }
        .login-block label.checkbox {
            margin-left: 1.3em;
            margin-top: 0;
            font-size: 1em;
            color: #555;
            font-weight: 400;
            display: inline-block;
            cursor: pointer;
        }
        .forgot {
            float: right;
            margin-top: 0.3em;
        }
        .forgot a {
            font-size: 0.75em;
            color:#FC8213;
            font-weight: 600;
            display: block;
            text-transform: uppercase;
        }
        .forgot a:hover{
            color:#68AE00;
        }
        .login-block h2{
            color:#68AE00;
            font-size:0.875em;
            margin:1.2em 0;
            text-align:center;
            font-family: 'Carrois Gothic', sans-serif;
        }
        /*--*/
        .login-icons ul {
            text-align:center;
        }
        .login-icons ul li{
            display: inline-block;
            margin: 0 0.5em;
        }
        .login-icons ul li a{
            display:block;
        }
        .login-icons i.fa.fa-facebook, .login-icons i.fa.fa-twitter, .login-icons i.fa.fa-google-plus {
            font-size: 1em;
            color: #FFFFFF;
            width: 33px;
            height: 33px;
            line-height: 34px;
            vertical-align: middle;
            background: #3b5998;
            transition: 0.5s all;
        }
        .login-icons i.fa.fa-facebook:hover, .login-icons i.fa.fa-twitter:hover, .login-icons i.fa.fa-google-plus:hover {
            border-radius: 35px;
        }
        .login-icons i.fa.fa-twitter{
            background:#55acee;
        }
        .login-icons i.fa.fa-google-plus{
            background:#dc4e41;
        }
        .login-icons i.fa.fa-dribbble{
            background:#ea4c89;
        }
        .forgot-grid{
            float:left;
        }
        .forgot-grid ul {
            margin:0;
            padding: 0px;
        }
        .forgot-grid ul li {
            list-style: none;
            display: inline-block;
        }
        .forgot-grid ul li input[type="checkbox"] {
            display: none;
        }
        .forgot-grid ul li input[type="checkbox"]+label {
            position: relative;
            padding-left: 31px;
            color: #FC8213;
            display: inline-block;
            cursor: pointer;
            font-size: .75em;
            font-weight: 600;
            text-transform: uppercase;
        }
        .forgot-grid ul li input[type="checkbox"]+label span:first-child {
            width: 17px;
            height: 17px;
            display: inline-block;
            border: 2px solid #FC8213;
            position: absolute;
            left: 0;
            bottom: 4px;
        }
        .forgot-grid ul li input[type="checkbox"]:checked+label span:first-child:before {
            content: "";
            background:url(../images/tick.png)no-repeat 1px -1px;
            position: absolute;
            left: 1px;
            top: 2px;
            font-size: 10px;
            width: 10px;
            height: 10px;
        }
        .login-block h3 {
            font-size: 1em;
            color: #000;
            text-align: center;
            margin-top: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .login-block h3 a{
            color:#337AB7;
        }
        .login-block h3 a:hover{
            color:#FC8213;
        }
        .login-block h5 {
            font-size: 1em;
            text-align: right;
            margin-top: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .login-block h5 a {
            color: #FC8213;
            text-decoration: underline;
        }
        .login-block h5 a:hover {
            color: #68AE00;
            text-decoration: underline;
        }
        /*--login page end here--*/
        /*--signup page start here--*/
        .signup-page-main {
            padding: 9em 0em;
        }
        .signup-main {
            width: 40%;
            margin: 0 auto;
            background: #FFFFFF;
            background-size: cover;
            min-height: 400px;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .signup-head {
            background: url(../images/login.jpg)no-repeat;
            background-size: cover;
            min-height: 150px;
        }
        .signup-head h1 {
            font-size:3em;
            color:#FFF;
            padding: 1em 0em 0em 0em;
            text-align: center;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .signup-block {
            padding: 4em 2em;
        }
        .signup-block input[type="text"], .signup-block input[type="password"] {
            font-size: 0.9em;
            padding: 10px 20px;
            width: 100%;
            color:#686967;
            outline: none;
            border: 1px solid #D3D3D3;
            border-radius: 5px;
            -ms-border-radius: 5px;
            -moz-border-radius: 5px;
            -o-border-radius: 5px;
            background:#F5F5F5;
            margin: 0em 0em 1.5em 0em;
        }
        .signup-block input[type="submit"] {
            border: none;
            outline: none;
            cursor: pointer;
            color: #fff;
            background: #337AB7;
            width: 100%;
            margin: 0 auto;
            border-radius: 3px;
            padding: 0.5em 1em;
            font-size: 1em;
            display: block;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .signup-block input[type="submit"]:hover{
            background:#68AE00;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all ;
            -ms-transition: 0.5s all;
        }
        .sign-down h4 {
            font-size: 1em;
            color: #000;
            text-align: center;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .sign-down h4 a {
            font-size: 1em;
            color: #000;
            text-align: center;
            margin-top: 1em;
            display: inline-block;;
        }
        .sign-down h4 a:hover{
            color:#68AE00;
        }
        .sign-down h5 {
            font-size: 1em;
            text-align: center;
            margin-top: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .sign-down h5 a {
            color: #337AB7;
            text-decoration: underline;
        }.sign-down h5 a:hover {
             color:#68AE00;
         }
        /*--signup page end here--*/
        /*--maps start here--*/
        .popin{
            background:#fff;
            padding:15px;
            box-shadow: 0 0 20px #999;
            border-radius:2px;
        }
        .map-main-page h2 {
            font-size: 2em;
            color: #68AE00;
            margin-bottom: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        #map1a,
        #panorama {
            height:300px;
            background:#6699cc;
        }
        .map-system {
            margin-bottom: 2em;
        }
        /*--maps end here--*/
        /*--balank page start here--*/
        .blank {
            min-height: 600px;
        }
        .blank h2 {
            font-size: 2em;
            color: #68AE00;
            margin-bottom: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .blankpage-main {
            padding: 2em 2em;
            background: #fff;
            margin-top:4em;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .blankpage-main p {
            font-size: 1.1em;
            color: #000;
            line-height: 1.8em;
        }
        /*--blank page end here--*/
        /*--charts start here--*/
        .dygno h2 {
            font-size:1.5em;
            color: #000;
            margin-bottom:0.5em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .line-chart {
            padding: 2em 2em;
            background: #fff;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .polararea {
            background: #fff;
            padding: 2em 2em;
            text-align: center;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .line-chart h3 {
            font-size: 1.5em;
            color: #000;
            font-family: 'Carrois Gothic', sans-serif;
            margin-bottom: 0.5em;
        }
        .chart-other h3 {
            font-size: 1.5em;
            color: #000;
            margin-bottom: 0.5em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .polararea h3 {
            font-size: 1.5em;
            color: #000;
            text-align: left;
            margin-bottom:0.5em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .dygno {
            padding: 2em 2em;
            background: #fff;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .chart-other {
            padding: 2em 2em;
            background: #fff;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        canvas#line {
            width: 560px !important;
            height:300px !important;
        }
        canvas#polarArea {
            width: 400px !important;
            height: 270px !important;
        }
        .chart-blo-1 {
            padding-bottom: 2em;
        }
        canvas#pie {
            width: 470px !important;
            height: 270px !important;
        }

        /*--charts end here--*/
        /*--error page start here--*/
        .error-404 {
            text-align: center;
        }
        .error-404 h2 {
            font-size: 6em;
            color: #63C5CA;
        }
        .error-404 h2 {
            font-size:3em;
            color:#FC8213;
            margin: 0.5em 0em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .error-404 a {
            font-size: 1em;
            color: #fff;
            margin-top: 2em;
            background: #68AE00;
            padding: 0.5em 1em;
            display: inline-block;
        }
        .error-404 a:hover {
            background:#337AB7;
        }
        .error-404 {
            min-height: 620px;
            margin-top:2em;
        }
        .error-right h4 {
            font-size: 1.3em;
            color: #000;
        }
        /*--inbox start here--*/
        .float-left {
            float: left;
            width: 40%;
        }
        .float-right {
            float: right;
            width: 50%;
        }
        .btn.btn_1.btn-default.mrg5R {
            float: left;
            width: 15%;
            margin: 0% 5% 0% 0%;
        }
        .mailbox-content {
            background: #fff;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        table.table.tab-border {
            border: 1px solid #D4D4D4;
        }
        .mail-toolbar.clearfix {
            padding: 1em 1em;
        }
        .dropdown-inbox {
            float: right;
            width: 80%;
        }
        .hidden-xs i.fa.fa-star.icon-state-warning{
            color: #FC9513;
        }
        .hidden-xs i.fa.fa-star{
            color: #999;
        }
        .hidden-xs i.fa.fa-star:hover {
            color: #FC9513;
        }
        .btn-group.m-r-sm.mail-hidden-options {
            margin: 0em 1em;
        }
        .mail-profile {
            background: #68AE00;
            padding: 1em 1em;
        }
        .mail-profile {
            background: #FC8213;
            padding: 1em 1em;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .mail-pic {
            float: left;
            width: 30%;
        }
        .mailer-name {
            float: right;
            width: 70%;
            margin-top: 1.4em;
        }
        .mailer-name h5 {
            font-size: 1.1em;
            margin-bottom: 0.3em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .mailer-name h5 a{
            color: #fff;
        }
        .mailer-name h6 {
            font-size: 0.8em;
            margin-bottom: 0.3em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .mailer-name h6 a{
            color: #fff;
        }
        .mailer-name h6 a:hover {
            color: #000;
        }
        .compose-block {
            padding: 1.5em 1em;
            text-align: center;
            background:#DEDEDE;
        }
        .compose-block a {
            font-size: 1em;
            color: #fff;
            background:#68AE00;
            padding: 0.5em 1.5em;
            border-radius:3px;
            display: inline-block;
        }
        .compose-block a:hover{
            background:#337AB7;
        }
        .compose-bottom ul {
            list-style: none;
            padding: 0px;
        }
        .compose-bottom ul li a{
            padding: 1em 1em;
            background: #EAEAEA;
            display: block;
            font-size: 1em;
            color: #797878;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .compose-bottom ul li a.hilate{
            background:#C5C5C5;
        }
        .compose-bottom ul li a:hover{
            background:#C5C5C5;
        }
        .compose-bottom i.fa.fa-inbox {
            font-size: 1.1em;
            margin-right: 12px;
            color: #797878;
        }
        .compose-bottom i.fa.fa-envelope-o{
            font-size: 1.1em;
            margin-right: 12px;
            color: #797878;
        }
        .compose-bottom i.fa.fa-star-o {
            font-size: 1.1em;
            margin-right: 12px;
            color: #797878;
        }
        .compose-bottom i.fa.fa-pencil-square-o {
            font-size: 1.1em;
            margin-right: 12px;
            color: #797878;
        }
        .compose-bottom i.fa.fa-trash-o {
            font-size: 1.1em;
            margin-right: 12px;
            color: #797878;
        }
        ul.nav.tabs li a span {
            background: #DE3939;
            border-radius: 15px;
            color: #fff;
            font-size: 0.9em;
            text-align: center;
            width: 17px;
            height: 17px;
            display: inline-block;
            float: right;
        }
        .inbox h2 {
            font-size: 2em;
            color: #68AE00;
            margin-bottom: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        /*--inbox end here--*/
        /*--inbox details--*/
        .compose-right .inbox-details-heading {
            padding: 0.8em 2em;
            background: #E4E4E4;
        }
        .compose-right .inbox-details-body {
            padding: 2em;
        }
        .compose-right .alert.alert-info {
            padding: 10px 20px;
            font-size: 0.9em;
            color: #fff;
            background-color:#337AB7;
            border-color:rgba(51, 122, 183, 0.82);
            border-radius: inherit;
        }
        .compose-right .form-group {
            margin: .5em 0;
        }
        .compose-right .btn.btn-file {
            position: relative;
            overflow: hidden;
            border-radius: inherit;
            cursor:pointer;
        }
        .inbox-details-default {
            background: #fff;
            font-family: 'Carrois Gothic', sans-serif;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
        }
        .compose-right .btn.btn-file>input[type='file'] {
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            outline: none;
            background: white;
            cursor:pointer;
            display: inline-flex;
            width: 100%;
            padding: 0.4em;
        }
        .compose-right p.help-block {
            display: inline-block;
            margin-left: 0.5em;
            font-size: 0.9em;
            color: #6F6F6F;
        }
        .inbox-details-body input[type="text"] {
            border: 1px solid #ccc;
            padding: 5px 8px;
            color: #616161;
            background: #fff;
            box-shadow: none !important;
            width: 100%;
            font-size: 0.85em;
            font-weight: 300;
            height: 40px;
            border-radius: 0;
            -webkit-appearance: none;
            resize: none;
            margin-bottom: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .inbox-details-body textarea{
            border: 1px solid #ccc;
            padding: 5px 8px;
            color: #616161;
            background: #fff;
            box-shadow: none !important;
            width: 100%;
            font-size: 0.85em;
            font-weight: 300;
            height: 14em;
            border-radius: 0;
            -webkit-appearance: none;
            resize: none;
            margin-bottom: 1em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .compose-right input[type="submit"] {
            font-size: 0.9em;
            background-color: #68AE00;
            border:none;
            color: #fff;
            padding:0.8em 1.5em;
            margin-top: 1em;
            outline: none;
        }
        .compose-right input[type="submit"]:hover {
            background-color: #FC8213;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .compose-right {
            padding: 0px;
        }
        /*--inbox details--*/
        /*--product start here--*/
        .product-items {
            border: 1px solid #ccc;
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
            margin-bottom: 3em;
        }
        .pro-head h2 {
            font-size: 2em;
            color: #68AE00;
            margin:0em 0em 1em 0.4em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .produ-cost {
            padding: 0.8em 1.5em;
            background: #337AB7;
        }
        .produ-cost h4 {
            font-size: 1.2em;
            color: #fff;
            margin-bottom: 0.5em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .produ-cost h5 {
            font-size: 1em;
            color: #fff;
            font-family: 'Carrois Gothic', sans-serif;
        }
        /*--light-box--*/
        .project-eff:hover span.rollover1 {
            background: url(../images/arrow.png) center no-repeat;
            width:300px;
            height:215px;
            cursor: pointer;
            display: block;
            position: absolute;
            z-index: -9999px;
            -webkit-transition: all 0.3s ease-out;
            -moz-transition: all 0.3s ease-out;
            -ms-transition: all 0.3s ease-out;
            -o-transition: all 0.3s ease-out;
            transition: all 0.3s ease-out;
        }

        .project-eff{
            -webkit-transition: all 0.3s ease-out;
            -moz-transition: all 0.3s ease-out;
            -ms-transition: all 0.3s ease-out;
            -o-transition: all 0.3s ease-out;
            transition: all 0.3s ease-out;
            position:relative;
        }
        /*--product end here--*/
        /*--prices start here--*/
        .prices-head h2 {
            font-size: 2em;
            color: #68AE00;
            margin:0em 0em 1em 0.4em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .price-list ul {
            padding: 0px;
            list-style: none;
        }
        .price-gd-top {
            background:#78A239;
            text-align: center;
            border-radius: 5px 5px 0px 0px;
        }
        .price-gd-top h4 {
            font-size: 1.8em;
            color: #fff;
            padding: 0.4em 1em;
            background:#467501;
            border-radius: 5px 5px 0px 0px;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .price-gd-top h3 {
            padding: 0.4em 0em;
            font-size: 3.3em;
            color: #fff;
            font-family: 'Carrois Gothic', sans-serif;
        }
        span.usa-dollar {
            font-size: 0.4em;
            vertical-align: top;
        }
        span.per-month {
            font-size: 0.4em;
        }
        .price-gd-top h5 {
            font-size: 1em;
            color: #fff;
            padding: 0.2em 0em 0.8em 0em;
            font-family: 'Carrois Gothic', sans-serif;
        }
        .price-gd-bottom {
            background: #fff;
            text-align: center;
            padding: 1em 0em;
        }
        .price-list ul li {
            padding: 0.5em 0em;
            font-size: 1em;
            color: #545454;
        }
        .price-selet {
            padding: 1em 0em;
            text-align: center;
            background: #78A239;
            border-radius: 0px 0px 5px 5px;
        }
        .price-selet a {
            font-size: 1.1em;
            color: #fff;
            display: block;
        }
        .price-selet a {
            font-size: 1.1em;
            color: #fff;
            display:block;
        }
        .price-grid {
            margin-bottom: 3em;
        }
        .pric-clr1 h4 {
            background:#09375F;
        }

        .pric-clr1 {
            background:#1A63A0;
        }
        .pric-clr3 h4 {
            background: #CC660E;
        }
        .pric-clr3 {
            background: #E07D28;
        }
        .price-block {
            box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15);
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .price-block:hover {
            transform: scale(1.1);
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -o-transform: scale(1.1);
            -ms-transform: scale(1.1);
            z-index: 1;
        }
        a.popup-with-zoom-anim {
            outline: none;
        }
        /*--pricing-grids--*/

        #small-dialog h4 {
            margin: 10px 0;
            font-size: 1.5em;
            color: #337AB7;
            font-family: 'Carrois Gothic', sans-serif;
        }

        #small-dialog,#small-dialog1,#small-dialog2,#small-dialog3,#small-dialog4,#small-dialog5{
            background: white;
            padding: 10px 0 10px 0;
            text-align: left;
            max-width: 629px;
            margin: 40px auto;
            position: relative;
            text-align: center;
            border: 8px solid #68AE00;
            height:475px;
            border-radius: 5px;
        }
        /*---start-pricing-tabels-----*/
        .payment-online-form-left{
        }
        form li {
            list-style: none;
        }
        form ul {
            padding:0;
        }
        h4.payment-head{
            font-size: 1.9em;
            color: #222222;
            padding: 0.5em 0;
            text-align: left;
            float: left;
        }
        .payment-online-form-left span{
            vertical-align: sub;
            margin-right:7px;
        }
        .payment-online-form-left form{
            padding:0 3%;
        }
        .payment-online-form-left input[type="text"] {
            padding: 0.7em 1em;
            color: #6B6B6A;
            width: 47%;
            margin: 0.5em 0;
            border: 1px solid;
            outline: none;
            transition: border-color 0.3s;
            -o-transition: border-color 0.3s;
            -ms-transition: border-color 0.3s;
            -moz-transition: border-color 0.3s;
            -webkit-transition: border-color 0.3s;
            float: left;
            font-size: 0.9em;
            border-color:#E67C1B;
            -webkit-appearance: none;
        }
        input#datepicker {
            padding: 1em 1em 1em 1em;
        }
        .payment-online-form-left input[type="text"]:hover{
            border-color:#fa6e6f;
        }
        .text-box-dark{
        }
        .text-box-light{
            background: url(../images/calender.png) no-repeat 95% 50%;
            cursor:pointer;
            position: relative;
        }
        .payment-online-form-left ul li:first-child input[type="text"]{
            margin-right: 5%;
        }
        .payment-online-form-left input[type="text"]:active, .payment-online-form-left input[type="text"]:hover {
            border-color: #FC8213;
            color:#6B6B6A;
        }
        .shoppong-pay-1{
            width: 32px;
            height: 32px;
            display: inline-block;
            background: url(../images/icon.png) no-repeat -111px -26px;
        }
        .payment{
            width: 32px;
            height: 32px;
            display: inline-block;
            background: url(../images/icon.png) no-repeat -154px -23px;
        }
        .payment-date-section{
            background: url(../images/calender.png) no-repeat #fff 50%;
        }
        .payment-sendbtns{
            float:right;
            margin: 1.2em 0 1em;
        }
        .payment-sendbtns input[type="reset"]{
            background:#68AE00;
            padding:10px 25px;
            border: none;
            color: #FFF;
            cursor: pointer;
            font-size:0.95em;
            display: inline-block;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            outline:none;
            border-radius: 3px;
        }
        .payment-sendbtns input[type="reset"]:hover{
            color:#FFF;
            background:#FC8213;
        }
        a.order {
            background:#FC8213;
            padding: 10px 25px;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size:0.95em;
            display: inline-block;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-appearance: none;
            outline: none;
            text-decoration: none;
            border-radius: 3px;
        }
        a.order:hover{
            color:#fff;
            background:#68AE00;
        }
        .payment-sendbtns li{
            display:inline-block;
        }
        .payment-type li{
            display:inline-block;
        }
        .payment-online-form-right{
            background: #2B2937;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -o-border-radius: 5px;
            border-radius: 5px;
            border-bottom: 4px solid #1A1822;
        }
        /*-----*/
        .get-started{
            background:url(../images/get.jpg) no-repeat 0px 0px;
            min-height:400px;
            padding:8% 0 0 0;
            color:#fff;
            background-size:cover;
            text-align:center;
        }
        .get-started h4{
            font-size:1.5em;
            margin-bottom:1em;
            font-weight:400;
            padding:0;
        }
        .get-started h3{
            font-size:2.8em;
            font-weight:400;
            margin-bottom:1em;
            padding:0;
        }
        .get-started a{
            padding: 12px 18px;
            border: 1px solid #FF0426;
            font-size: 1.2em;
            color: #fff;
            outline: none;
            font-weight: 400;
            text-decoration:none;
            background: #f94877;
        }
        .get-started a:hover{
            background:transparent;
            border: 1px solid #f94877;
        }
        /*-----*/
        .visa{
            display: inline-block;
            width: 32px;
            height: 32px;
            background:url(../images/icon.png) no-repeat -32px -28px;
        }
        .paypal{
            display: inline-block;
            width: 32px;
            height: 32px;
            background: url(../images/icon.png) no-repeat -71px -26px;
        }
        .payment-online-form-right{
            float: right;
            width: 30%;
            background: #2B2937;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -o-border-radius: 5px;
            border-radius: 5px;
            border-bottom: 4px solid #1A1822;
            padding-bottom: 2em;
        }
        .payment-online-form-right a:hover{
            color:#1ABC9C;
        }
        .payment-online-form-right ul li{
            display:block;
            padding: 0.5em;
        }
        .payment-online-form-right ul li a{
            color:#9095AA;
        }
        .payment-online-form-right h4{
            color: #FFF;
            font-size: 1em;
            text-transform: uppercase;
            border-bottom: 1px solid rgba(144, 149, 170, 0.22);
            padding: 0.8em;
        }
        .payment-online-form-right ul {
            padding: 0px 1em;
        }
        .payment-online-form-right h5{
            color: #FFF;
            padding: 0.5em 0.8em 0.4em;
            font-size: 1em;
        }
        .payment-type {
            margin-top: 3%;
            text-align: left;
        }
        input[type=checkbox].css-checkbox3,input[type=checkbox].css-checkbox4,input[type=checkbox].css-checkbox5,input[type=checkbox].css-checkbox6{
            display: none;
        }
        input[type=checkbox].css-checkbox3 + label.css-label3 {
            height: 22px;
            width: 21px;
            display: inline-block;
            line-height: 18px;
            background-repeat: no-repeat;
            background-position: 0 -38px;
            vertical-align: middle;
            cursor: pointer;
            background-image: url(../images/filter-bg.png);
        }
        input[type=checkbox].css-checkbox3:checked + label.css-label3 {
            background-position: 0px 0px;
        }
        input[type=checkbox].css-checkbox4 + label.css-label4 {
            height: 22px;
            width: 21px;
            display: inline-block;
            line-height: 18px;
            background-repeat: no-repeat;
            background-position: 0 0px;
            vertical-align: middle;
            cursor: pointer;
            background-image: url(../images/filter-bg.png);
        }
        input[type=checkbox].css-checkbox4:checked + label.css-label4 {
            background-position: 0px -38px;
        }
        input[type=checkbox].css-checkbox5 + label.css-label5 {
            height: 22px;
            width: 21px;
            display: inline-block;
            line-height: 18px;
            background-repeat: no-repeat;
            background-position: 0 -38px;
            vertical-align: middle;
            cursor: pointer;
            background-image: url(../images/filter-bg.png);
        }
        input[type=checkbox].css-checkbox5:checked + label.css-label5 {
            background-position: 0px 0px;
        }
        input[type=checkbox].css-checkbox6 + label.css-label6 {
            height: 22px;
            width: 21px;
            display: inline-block;
            line-height: 18px;
            background-repeat: no-repeat;
            background-position: 0 0px;
            vertical-align: middle;
            cursor: pointer;
            background-image: url(../images/filter-bg.png);
        }
        input[type=checkbox].css-checkbox6:checked + label.css-label6 {
            background-position: 0px -38px;
        }

        /* start state */
        .my-mfp-zoom-in #small-dialog {
            opacity: 0;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            -webkit-transform: scale(0.8);
            -moz-transform: scale(0.8);
            -ms-transform: scale(0.8);
            -o-transform: scale(0.8);
            transform: scale(0.8);
        }
        /* animate in */
        .my-mfp-zoom-in.mfp-ready #small-dialog {
            opacity: 1;
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1);
            transform: scale(1);
        }
        /* animate out */
        .my-mfp-zoom-in.mfp-removing #small-dialog {
            -webkit-transform: scale(0.8);
            -moz-transform: scale(0.8);
            -ms-transform: scale(0.8);
            -o-transform: scale(0.8);
            transform: scale(0.8);
            opacity: 0;
        }
        /* Dark overlay, start state */
        .my-mfp-zoom-in.mfp-bg {
            opacity: 0;
            -webkit-transition: opacity 0.3s ease-out;
            -moz-transition: opacity 0.3s ease-out;
            -o-transition: opacity 0.3s ease-out;
            transition: opacity 0.3s ease-out;
        }
        /* animate in */
        .my-mfp-zoom-in.mfp-ready.mfp-bg {
            opacity: 0.8;
        }
        /* animate out */
        .my-mfp-zoom-in.mfp-removing.mfp-bg {
            opacity: 0;
        }
        /**
/* Magnific Popup CSS */
        .mfp-bg {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1042;
            overflow: hidden;
            position: fixed;
            background:#151515;
            opacity: 0.8;
            filter: alpha(opacity=80); }
        .mfp-wrap {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1043;
            position: fixed;
            outline: none !important;
            -webkit-backface-visibility: hidden; }
        .mfp-container {
            text-align: center;
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            padding: 0 8px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box; }
        .mfp-container:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle; }
        .mfp-align-top .mfp-container:before {
            display: none; }
        .mfp-content {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            margin: 0 auto;
            text-align: left;
            z-index: 1045; }
        .mfp-inline-holder .mfp-content,
        .mfp-ajax-holder .mfp-content {
            width: 100%;
            cursor: auto; }
        .mfp-ajax-cur {
            cursor: progress; }
        .mfp-zoom-out-cur, .mfp-zoom-out-cur .mfp-image-holder .mfp-close {
            cursor: -moz-zoom-out;
            cursor: -webkit-zoom-out;
            cursor: zoom-out; }
        .mfp-zoom {
            cursor: pointer;
            cursor: -webkit-zoom-in;
            cursor: -moz-zoom-in;
            cursor: zoom-in;
        }
        .mfp-auto-cursor .mfp-content {
            cursor: auto; }
        .mfp-close, .mfp-arrow, .mfp-preloader, .mfp-counter {
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        .mfp-loading.mfp-figure {
            display: none; }
        .mfp-hide {
            display: none !important;
        }
        .mfp-content iframe{
            width:100%;
            min-height:500px;
        }
        .mfp-preloader {
            color: #cccccc;
            position: absolute;
            top: 50%;
            width: auto;
            text-align: center;
            margin-top: -0.8em;
            left: 8px;
            right: 8px;
            z-index: 1044;
        }
        .mfp-preloader a {
            color: #cccccc;
        }
        .mfp-preloader a:hover {
            color: white;
        }
        .mfp-s-ready .mfp-preloader {
            display: none;
        }
        .mfp-s-error .mfp-content {
            display: none;
        }
        button.mfp-close,button.mfp-arrow {
            overflow: visible;
            cursor: pointer;
            border: 0;
            background:#FC8213;
            -webkit-appearance: none;
            display: block;
            padding: 0;
            z-index: 1046;
        }
        button::-moz-focus-inner {
            padding: 0;
            border: 0;
        }
        .mfp-close {
            width: 35px;
            height: 35px;
            line-height: 17px;
            position: absolute;
            right: 0%;
            top:0%;
            text-decoration: none;
            text-align: center;
            color: white;
            font-style: normal;
            font-size: 28px;
            outline: none;
            padding: 0 !important;
        }
        .mfp-close:hover, .mfp-close:focus {
            opacity: 1;
        }
        .mfp-close-btn-in .mfp-close {
            color:#FFFFFF;
            padding: 0 0 7px 0px;
        }
        .mfp-image-holder .mfp-close,.mfp-iframe-holder .mfp-close {
            color: white;
            right: -6px;
            text-align: right;
            padding-right: 6px;
            width: 100%;
        }
        .image-top img{
            width:100%;
        }
        .image-top p{
            text-align: justify;
            padding:2% 0;
            font-size:15px;
        }
        .image-top h3 {
            font-size: 1.5em;
            font-weight: 500;
            margin: 16px 0px 0px 0px;
            color:#3F4244;
        }
        p.bottom {
            text-align: center;
            width: 70%;
            margin: 0 auto;
            padding: 15px 0;
            color: #999;
            font-size: 14px;
        }
        /*--prices end here--*/
        /*--meadia quiries start here--*/
        @media (max-width:1440px){
            .page-container.sidebar-collapsed-back .sidebar-menu {
                width: 190px;
            }
            .sidebar-menu {
                width: 190px;
            }
            .logo {
                left: 130px;
            }
            .page-container.sidebar-collapsed .logo {
                left: 16px;
            }
            canvas#bar {
                width: 515px !important;
            }
            .malorm-bottom p {
                width: 90%;
            }
            span.malorum-pro {
                left: 225px;
            }
            canvas#line {
                width: 490px !important;
            }
        }
        @media (max-width:1366px){
            canvas#bar {
                width: 485px !important;
            }
            .popular-bran-left h4 {
                font-size: 0.8em;
            }
            .left-content {
                width: 86%;
            }
            #menu li a {
                padding: 12px 20px;
            }
            canvas#line {
                width: 460px !important;
            }
            canvas#radar {
                width: 480px !important;
            }
            .btn-group.m-r-sm.mail-hidden-options {
                margin: 0em 0.3em;
            }
            li.dropdown.head-dpdn a.dropdown-toggle {
                margin: 1em 1.8em;
            }
            .logo-name h1 {
                font-size: 2.3em;
                margin-top: 0.1em;
            }

            #menu .fa {
                margin-bottom: 3px;
            }
            .project-eff:hover span.rollover1 {
                width: 243px;
            }
            .search-box input[type="text"] {
                width: 85%;
            }
            .boost-icons-list ul li {
                font-size: 0.9em;
            }
        }
        @media (max-width:1280px){
            .left-content {
                width: 85%;
            }
            .market-update-block p {
                font-size: 0.75em;
            }
            .market-update-right {
                padding: 0px;
            }
            .malorm-bottom p {
                width: 100%;
            }
            canvas#bar {
                width: 440px !important;
            }
            .popular-bran-left h4 {
                font-size: 0.75em;
            }
            .popular-bran-left p {
                font-size: 0.9em;
            }
            canvas#line {
                width: 410px !important;
            }
            span.malorum-pro {
                left: 190px;
            }
            canvas#radar {
                width: 445px !important;
            }
            .btn-group.m-r-sm.mail-hidden-options {
                margin: 0em 0.1em;
            }
            .text-muted {
                font-size: 0.8em;
            }
            .popular-bran-left {
                padding: 2.3em 1em;
            }
            li.dropdown.head-dpdn a.dropdown-toggle {
                margin: 1em 1.6em;
            }
            .mail-pic {
                width: 40%;
            }
            .mailer-name {
                width: 60%;
            }
            canvas#doughnut {
                width: 420px !important;
            }
            canvas#pie {
                width: 415px !important;
            }
            .project-eff:hover span.rollover1 {
                width: 222px;
            }
            .search-box input[type="text"] {
                width: 83%;
            }
        }
        @media (max-width:1024px){
            .page-container {
                min-width: 990px;
            }
            .logo-name {
                float: left;
                width: 30%;
                margin:0% 4% 0% 0%;
            }
            .logo-name {
                width: 37%;
            }
            .search-box {
                float: left;
                width: 55%;
            }
            li.dropdown.head-dpdn a.dropdown-toggle {
                margin: 1em 1.1em;
            }
            .profile_details {
                float: right;
                width: 50%;
            }
            .fixed {
                position: fixed;
                top: 0;
                width: 85%;
            }
            .profile_details_drop a.dropdown-toggle {
                display: block;
                padding: 0em 2em 0 1em;
            }
            .page-container.sidebar-collapsed-back .left-content {
                width: 82%;
            }
            .market-update-block h4 {
                font-size: 0.9em;
            }
            .market-update-block {
                padding: 1.5em 1.5em;
            }
            .market-update-right i.fa.fa-file-text-o {
                font-size: 2em;
                width: 60px;
                height: 60px;
                margin-top: 0.7em;
            }
            .market-update-right i.fa.fa-eye{
                font-size: 2em;
                width: 60px;
                height: 60px;
                margin-top: 0.7em;
            }
            .market-update-right i.fa.fa-envelope-o {
                font-size: 2em;
                width: 60px;
                height: 60px;
                margin-top: 0.7em;
            }
            .malorm-bottom p {
                font-size: 0.8em;
            }
            canvas#bar {
                width: 341px !important;
                height: 280px !important;
            }
            .malorum-top {
                min-height: 176px;
            }
            span.malorum-pro {
                left: 145px;
            }
            .left-content {
                width: 82%;
            }
            .chit-chat-layer1-rit {
                padding:0em 0em 0em 0.5em;
            }
            .chit-chat-layer1-left {
                padding: 0em 0.5em 0em 0em;
            }
            .market-update-gd {
                padding: 0px;
            }
            .chart-layer1-left {
                padding: 0em 0.5em 0em 0em;
            }
            .chart-layer1-right {
                padding: 0em 0em 0em 0.5em;
            }
            .chart-layer2-right {
                padding: 0em 0.5em 0em 0em;
            }
            .chart-layer2-left {
                padding: 0em 0em 0em 0.5em;
            }
            canvas#radar {
                width: 350px !important;
                height: 350px !important;
            }
            .climate-grids {
                padding: 0em 0.5em 0em 0em;
            }
            .shoppy h3 {
                font-size: 1.1em;
            }
            .climate-gd1-top {
                margin-bottom: 0em;
            }
            .climate-gd1top-left {
                padding: 0px;
            }
            .popular-bran-left p {
                font-size: 0.7em;
            }
            .popular-follo-left p {
                font-size: 0.75em;
            }
            .popular-bran-left {
                background: #fff;
                padding: 1.5em 1em;
            }
            .popular-bran-right {
                padding: 2.4em 1em;
            }
            .popular-follo-right {
                padding: 2.8em 1em;
            }
            .climate-grid1 {
                min-height: 350px;
            }
            .climate-grid2 {
                min-height: 286px;
            }
            .popular-follow {
                margin-top: 3.2em;
            }
            .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
                font-size: 0.86em;
            }
            .panel-body {
                padding: 20px;
                font-size: 0.9em;
            }
            .login-main {
                width: 50%;
            }
            .signup-main {
                width: 50%;
            }
            canvas#doughnut {
                width: 300px !important;
                height: 250px !important;
            }
            canvas#line {
                width: 290px !important;
                height: 250px !important;
            }
            canvas#polarArea {
                width: 295px !important;
                height: 240px !important;
            }
            canvas#pie {
                width: 305px !important;
                height: 240px !important;
            }
            .mailer-name {
                width: 57%;
            }
            .mail-pic {
                width: 40%;
            }
            .mail-pic img {
                width: 100%;
            }
            .btn.btn_1.btn-default.mrg5R {
                width: 25%;
            }
            .dropdown-inbox {
                width: 60%;
            }
            .float-right {
                width: 60%;
            }
            .mail-toolbar.clearfix {
                padding: 1em 0em;
            }
            .text-muted {
                font-size: 0.75em;
            }
            .btn-group.m-r-sm.mail-hidden-options {
                margin: 0em 0.1em;
            }
            .compose-bottom ul li a {
                font-size: 0.9em;
            }
            .compose-block a {
                font-size: 0.8em;
            }
            .compose-block {
                padding: 1em 1em;
            }
            .error-404 {
                margin-top: 0em;
            }
            .error-404 h2 {
                font-size: 2.5em;
            }
            .blankpage-main p {
                font-size: 1em;
            }
            .produ-cost h4 {
                font-size: 1em;
            }
            .produ-cost {
                padding: 0.8em 1em;
            }
            .price-gd-top h4 {
                font-size: 1.4em;
            }
            .price-gd-top h3 {
                font-size: 2.8em;
            }
            .price-list ul li {
                font-size: 0.8em;
            }
            .price-selet a {
                font-size: 1em;
            }
            .product-items {
                margin-bottom: 2em;
            }
            .col-lg-6.mb-60 h4 {
                font-size: 1.5em;
                margin-bottom: 0.2em;
            }
            .product-grid {
                padding: 0px 12px 0px 0px;
            }
            .profile_details_left ul {
                padding: 0px;
            }
            div#geoChart {
                height: 292px!important;
            }
            .project-eff:hover span.rollover1 {
                width: 180px;
                height: 130px;
            }
            .boost-icons-list ul li {
                font-size: 0.7em;
            }
        }
        @media (max-width:991px){
            .market-update-gd {
                float: left;
                width: 33%;
                text-align: center;
            }
            /*--logoname--*/
            .logo-name {
                width: 39%;
                margin: 0% 1% 0% 0%;
            }
            .search-box {
                width: 60%;
            }
            .logo-name h1 {
                font-size: 1.7em;
                margin-top: 0.3em;
            }
            .search-box input[type="text"] {
                width: 80%;
            }
            li.dropdown.head-dpdn a.dropdown-toggle {
                margin: 1em 1em;
            }
            .profile_details_drop a.dropdown-toggle {
                padding: 0em 0em 0 0em;
            }
            .profile_details li a i.fa.lnr {
                top: 20%;
                right: 0%;
            }
            .market-update-gd {
                float: left;
                width: 33%;
                text-align: center;
            }
            .market-update-block {
                padding: 1em 1em;
            }
            .market-update-right i.fa.fa-file-text-o {
                font-size: 2em;
                width: 60px;
                height: 60px;
                line-height: 1.9em;
                margin-top: 0px;
            }
            .market-update-right i.fa.fa-eye{
                font-size: 2em;
                width: 60px;
                height: 60px;
                line-height: 1.9em;
                margin-top: 0em;
            }
            .market-update-right i.fa.fa-envelope-o{
                font-size: 2em;
                width: 60px;
                height: 60px;
                line-height: 1.9em;
                margin-top: 0px;
            }
            .market-update-left {
                padding-bottom: 0.8em;
            }
            .market-update-block h3 {
                font-size: 2em;
            }
            .market-update-block h4 {
                font-size: 1em;
            }
            .chit-chat-layer1-left {
                padding: 0em 0em 2em 0em;
            }
            .chart-layer1-left {
                padding: 0em 0em 0em 0em;
                float: left;
                width: 49%;
            }
            .chart-layer1-right {
                padding: 0px;
                float: right;
                width: 49%;
            }
            .chart-layer2-right {
                padding: 0px;
                float: left;
                width: 49%;
            }
            .chart-layer2-left {
                padding: 0px;
                float: right;
                width: 49%;
            }
            .climate-grids {
                padding: 0px;
            }
            .cloudy1 {
                float: left;
                width: 33%;
            }
            canvas#bar {
                width: 285px !important;
                height: 240px !important;
            }
            .malorm-bottom {
                padding: 1.5em 1em;
            }
            .malorm-bottom p {
                font-size: 0.75em;
            }
            .malorm-bottom h2 {
                font-size: 1.2em;
            }
            .malorm-bottom h4 {
                font-size: 0.85em;
            }
            .malorum-top {
                min-height: 156px;
            }
            canvas#radar {
                width: 270px !important;
                height: 270px !important;
            }
            .bar_group__bar.thin {
                margin-bottom: 20px !important;
            }
            .climate-gd1top-left {
                float: left;
                width: 50%;
                text-align: center;
            }
            .climate-gd1top-right {
                float: right;
                width: 50%;
                text-align: center;
            }
            .popular-bran-left {
                float: left;
                width: 50%;
            }
            .popular-bran-right {
                float: right;
                width: 50%;
                padding: 2em 1em;
            }
            .popular-follo-left {
                float: left;
                width: 50%;
            }
            .popular-follo-right {
                float: right;
                width: 50%;
                padding: 2em 1em;
            }
            .climate-grid2 {
                background: url(../images/shoppy.jpg)no-repeat center;
                min-height: 290px;
                background-size: cover;
                margin: 2em 0em 0em 0em;
            }
            .popular-follow {
                margin-top: 2em;
            }
            .popular-brand {
                margin-top: 2em;
            }
            .popular-bran-left p {
                font-size: 1em;
            }
            .popular-follo-left p {
                font-size: 1em;
            }
            .price-grid {
                margin-bottom: 2em;
                float: left;
                width: 50%;
            }
            .col-sm-6 {
                width: 100%;
            }
            .btn-lg, .btn-group-lg > .btn {
                padding: 7px 10px;
            }
            .popular-bran-left {
                padding: 1.75em 1em;
            }
            .portlet-grid {
                width: 49%;
            }
            .map-1 {
                margin-bottom: 2em;
            }
            .login-main {
                width: 70%;
            }
            .signup-main {
                width: 70%;
            }
            .dygno {
                padding: 1em 1em;
            }
            .line-chart {
                padding: 1em 1em;
            }
            .polararea {
                padding: 1em 1em;
            }
            .chart-other {
                padding: 1em 1em;
            }
            .chart-blo-1 {
                float: left;
                width: 50%;
                padding: 0px 12px 15px 0px;
            }
            canvas#doughnut {
                width: 275px !important;
            }
            canvas#line {
                width: 275px !important;
            }
            .compose {
                padding: 0em 0em 2em 0em;
            }
            .mail-pic img {
                width: 75%;
            }
            .mail-pic {
                width: 15%;
            }
            .mailer-name {
                width: 85%;
                margin-top: 1em;
            }
            .compose-right {
                padding: 0px;
            }
            .product-grid {
                float: left;
                width: 50%;
            }
            .project-eff:hover span.rollover1 {
                width: 308px;
                height: 220px;
            }
            .map-1 {
                padding: 0px;
            }
            .map-2 {
                padding: 0px;
            }
            span.malorum-pro {
                left: 115px;
            }
            .chit-chat-layer1-rit {
                padding: 0em 0em 0em 0em;
            }
            .boost-icons-list ul li {
                width: 24%;
            }
        }
        @media (max-width:768px){
            .page-container {
                min-width:650px;
                position: relative;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                margin: 0px auto;
            }
            .sidebar-menu {
                position:absolute;
                float: left;
                width: 170px;
            }
            .left-content {
                float: right;
                width: 92%;
            }
            .page-container.sidebar-collapsed {
                transition: all 100ms linear;
                transition-delay: 300ms;
            }
            .fixed {
                width: 92%;
            }
            .page-container.sidebar-collapsed .left-content .fixed {
                width: 97%;
            }
            .page-container.sidebar-collapsed-back {
                transition: all 100ms linear;
            }
            .page-container.sidebar-collapsed-back .left-content {
                transition: all 100ms linear;
                -webkit-transition: all 0.3s ease;
                -moz-transition: all 0.3s ease;
                transition: all 0.3s ease;
                float: right;
                width: 92%;
            }
            .page-container.sidebar-collapsed .sidebar-menu {
                width:180px;
                transition: all 100ms ease-in-out;
                transition-delay: 300ms;
            }
            .page-container.sidebar-collapsed-back .sidebar-menu {
                width: 65px;
                transition: all 100ms ease-in-out;
            }
            #menu li a {
                padding: 20px 20px;
                text-align: left !important;
            }
            #menu .fa {
                margin-bottom: 9px;
            }
            .logo {
                left: 16px;
            }

            .page-container.sidebar-collapsed-back #menu span{
                display:none;
            }
            .page-container.sidebar-collapsed #menu span {
                opacity: 1;
                transition: all 50ms linear;
                display:block;

            }
            #menu span {
                opacity:0;
                transition: all 50ms linear;
                display: block;

            }
            span.fa.fa-angle-right,span.fa.fa-angle-double-right {


                right: 12px!important;
            }
            .sidebar-menu {
                width: 65px;
                transition: all 100ms ease-in-out;
                transition-delay: 300ms;
            }

        }
        @media (max-width:736px){
            .malorm-bottom p {
                font-size: 0.7em;
            }
            canvas#line {
                width: 259px !important;
            }
            canvas#pie {
                width: 264px !important;
            }
        }
        @media (max-width:667px){
            li.dropdown.head-dpdn a.dropdown-toggle {
                margin: 1em 0.9em;
            }
            .user-name {
                margin-left: 5px;
            }
            canvas#bar {
                width: 238px !important;
            }
            .logo-name h1 {
                font-size: 1.6em;
                margin-top: 0.35em;
            }
            canvas#line {
                width: 234px !important;
            }
            canvas#doughnut {
                width: 235px !important;
            }
            canvas#polarArea {
                width: 235px !important;
            }
            canvas#pie {
                width: 235px !important;
            }
        }
        @media (max-width:640px){
            .header-left {
                float: none;
                width: 100%;
                margin-bottom: 0.4em;
            }
            .search-box {
                margin-top: 0em;
            }
            .header-right {
                float: none;
                width: 100%;
            }
            .logo-name h1 {
                font-size: 1.9em;
            }
            .logo-name h1 {
                font-size: 2em;
            }
            .inner-block {
                padding: 10em 2em 2em 2em;
            }
            .chart-layer1-left {
                padding: 0em 0em 2em 0em;
                float: none;
                width: 100%;
            }
            canvas#bar {
                width: 500px !important;
            }
            .chart-layer1-right {
                float: none;
                width: 100%;
            }
            span.malorum-pro {
                left: 220px;
            }
            .chart-layer2-right {
                padding: 0em 0em 2em 0em;
                float: none;
                width: 100%;
            }
            .chart-layer2-left {
                float: none;
                width: 100%;
            }
            .revenue {
                text-align: center;
            }
            .popular-bran-left {
                padding: 1.1em 1em;
            }
            .popular-bran-left h4 {
                font-size: 0.9em;
            }
            .popular-bran-left p {
                margin-top: 1em;
            }
            .btn-lg, .btn-group-lg > .btn {
                font-size: 14px;
            }
            .btn {
                padding: 6px 12px;
                font-size: 13px;
            }
            .login-main {
                width: 80%;
            }
            .signup-main {
                width: 80%;
            }
            .signup-block {
                padding: 3em 2em;
            }
            .login-block {
                padding: 3em 2em;
            }
            .chart-blo-1 {
                float: none;
                width: 100%;
                padding: 0px 0px 15px 0px;
            }
            canvas#line {
                width: 500px !important;
            }
            .dygno {
                text-align: center;
            }
            .dygno h2 {
                text-align: left;
            }
            .chart-other {
                text-align: center;
            }
            .chart-other h3 {
                text-align: left;
            }
            .project-eff:hover span.rollover1 {
                width: 253px;
            }
            .left-content {
                width:90%;
            }
            canvas#bar {
                width: 475px !important;
            }
            .page-container.sidebar-collapsed-back .left-content {
                width: 90%;
            }
            .page-container {
                min-width: 640px;
            }
            canvas#line {
                width: 475px !important;
            }
            .grid_3.grid_4 {
                padding: 1em 1em;
            }
            .typo-buttons {
                padding: 1em 1em;
            }
            .typo-alerts {
                padding: 1em 1em;
            }
            .typo-progresses {
                padding: 1em 1em;
            }
            .typo-wells {
                padding: 1em 1em;
            }
            .typo-badges {
                padding: 1em 1em;
            }
            .boost-icons-list ul li {
                width: 32%;
            }
            .search-box input[type="text"] {
                width: 90%;
            }
            .mb40 {
                margin-bottom: 20px !important;
            }
        }
        @media (max-width:600px){
            .page-container {
                min-width: 600px;
            }
            canvas#bar {
                width: 445px !important;
            }
            .search-box input[type="text"] {
                width: 88%;
            }
            canvas#line {
                width: 443px !important;
            }
        }
        @media (max-width:568px){
            .page-container {
                min-width: 565px;
            }
            canvas#bar {
                width: 409px !important;
            }
            .search-box input[type="text"] {
                width: 88%;
            }
            canvas#line {
                width: 415px !important;
            }
        }
        @media (max-width:480px){
            .page-container {
                min-width: 495px;
            }
            .market-update-gd {
                float: none;
                width: 100%;
            }
            .left-content {
                width: 87%;
            }
            .page-container.sidebar-collapsed-back .left-content {
                width: 87%;
            }
            .market-update-block.clr-block-1 {
                margin: 0em 0em 1em 0em;
            }
            .market-update-block.clr-block-2 {
                margin: 0em 0em 1em 0em;
            }
            canvas#bar {
                width: 335px !important;
            }
            .page-container {
                min-width: 480px;
            }
            .inner-block {
                padding: 10em 1em 2em 1em;
            }
            .chit-chat-layer1 {
                margin: 1em 0em;
            }
            .chit-chat-layer1-left {
                padding: 0em 0em 1em 0em;
            }
            .chart-layer1-left {
                padding: 0em 0em 1em 0em;
            }
            canvas#bar {
                width: 350px !important;
            }
            span.malorum-pro {
                left: 150px;
            }
            .chart-layer-2 {
                margin: 1em 0em;
            }
            .chart-layer2-right {
                padding: 0em 0em 1em 0em;
            }
            .climate-grid2 {
                margin: 1em 0em 0em 0em;
            }
            .popular-brand {
                margin-top: 1em;
            }
            .popular-follow {
                margin-top: 1em;
            }
            .profile_details li a i.fa.lnr {
                right: 5%;
            }
            .cols-grids {
                padding: 0em 0em;
            }
            .portlet-grid {
                width: 100%;
                float: none;
            }
            .button-heading h4 {
                font-size: 1.5em;
            }
            .btn-effcts.panel-widget {
                margin-top: 1em;
            }
            h1#h1-bootstrap-heading {
                font-size: 1.5em;
            }
            h2#h2-bootstrap-heading {
                font-size: 1.4em;
            }
            h3#h3-bootstrap-heading {
                font-size: 1.3em;
            }
            .typo-buttons {
                margin: 1em 0em;
            }
            .page-header h3 {
                font-size: 1.5em;
            }
            .typo-progresses {
                margin: 1em 0em;
            }
            .page-header {
                padding-bottom: 8px;
                margin: 10px 0 10px;
            }
            .typo-wells h3 {
                font-size: 1.5em;
            }
            .typo-badges h3 {
                font-size: 1.5em;
            }
            .typo-wells {
                margin-bottom: 1em;
            }
            .map-main-page h2 {
                margin-bottom: 0.5em;
            }
            .map-1 {
                margin-bottom: 1em;
            }
            .map-system {
                margin-bottom: 1em;
            }
            .login-main {
                width: 90%;
            }
            .login-block {
                padding: 1.5em 1.5em;
            }
            .login-block input[type="text"], .login-block input[type="password"] {
                margin: 0em 0em 1em 0em;
            }
            .forgot-top-grids {
                margin: 0em 0em 0.8em 0em;
            }
            .signup-main {
                width: 90%;
            }
            .signup-block {
                padding: 2em 1.5em;
            }
            .signup-head h1 {
                font-size: 2.5em;
                padding: 1.3em 0em 0em 0em;
            }
            .login-head h1 {
                font-size: 2.5em;
                padding: 1.3em 0em 0em 0em;
            }
            canvas#line {
                width: 350px !important;
            }
            .copyrights p {
                font-size: 0.9em;
            }
            .float-left {
                float: none;
                width: 100%;
            }
            .float-right {
                width: 100%;
                float: none;
                margin-top: 0.8em;
            }
            .error-page-left img {
                width: 60%;
            }
            .error-404 h2 {
                font-size: 2em;
            }
            .error-404 a {
                margin-top: 1em;
            }
            .blank {
                min-height: 480px;
            }
            .blankpage-main p {
                font-size: 0.9em;
            }
            .price-grid {
                padding: 0px 19px 0px 0px;
            }
            .price-grid {
                margin-bottom: 1.5em;
                float: none;
                width: 100%;
            }
            .boost-icons-list ul li {
                width: 49%;
            }
            .search-box input[type="text"] {
                width: 85%;
            }
            .search-box input[type="submit"] {
                background: url(../images/search.png)no-repeat 2px 2px;
                background-size: 15px;
            }
        }
        @media (max-width:414px){
            .page-container {
                min-width: 410px;
            }
            canvas#bar {
                width: 295px !important;
            }
            span.malorum-pro {
                left: 120px;
            }
            .popular-bran-left p {
                margin-top: 0.2em;
            }
            .profile_details ul li ul.dropdown-menu.drp-mnu {
                min-width: 165px;
            }
            canvas#line {
                width: 295px !important;
            }
        }
        @media (max-width:384px){
            .page-container {
                min-width: 380px;
            }
            .left-content {
                width: 83%;
            }
            canvas#bar {
                width: 275px !important;
            }
            .header-main {
                padding: 1em 1em;
            }
            .fixed {
                width: 83%;
            }
            .logo-name h1 {
                font-size: 1.8em;
                margin-top: 0em;
            }
            canvas#bar {
                width: 255px !important;
            }
            .popular-bran-left p {
                font-size: 0.8em;
                margin-top: 0.5em;
            }
            .popular-follo-left {
                padding: 1.5em 1em;
            }
            .popular-follo-left p {
                font-size: 0.8em;
            }
            .search-box input[type="text"] {
                width: 82%;
            }
            .profile_details ul li ul.dropdown-menu.drp-mnu {
                min-width: 146px;
            }
            ul.dropdown-menu {
                min-width: 198px;
            }
            .profile_details li a i.fa.lnr {
                right: -5%;
            }
            canvas#line {
                width: 252px !important;
            }
            canvas#polarArea {
                width: 265px !important;
                height: 215px !important;
            }
            canvas#doughnut {
                width: 255px !important;
            }
            canvas#pie {
                width: 251px !important;
            }
            .boost-icons-list ul li {
                font-size: 0.6em;
            }
            .forgot a {
                font-size: 0.65em;
            }
            .forgot-grid ul li input[type="checkbox"]+label {
                font-size: .65em;
                padding-left: 21px;
            }
            .forgot-grid ul li input[type="checkbox"]+label span:first-child {
                bottom: -1px;
            }
            .forgot-top-grids {
                padding: 0em 0.5em;
            }
        }
        @media (max-width:375px){
            .page-container {
                min-width: 375px;
            }
        }
        @media (max-width:320px){
            .page-container {
                min-width: 303px;
            }
            .logo-name h1 {
                font-size: 1.4em;
            }
            .left-content {
                width: 86%;
            }
            .page-container.sidebar-collapsed-back .left-content {
                width: 83%;
            }
            .header-main {
                padding: 1em 0.5em;
            }
            li.dropdown.head-dpdn a.dropdown-toggle {
                margin: 1em 0.4em;
            }
            .search-box {
                width: 50%;
            }
            .search-box input[type="text"] {
                width: 76%;
            }
            .profile_details_left {
                width: 40%;
            }
            .profile_details {
                width: 60%;
            }
            .fixed {
                width: 84%;
            }
            .search-box {
                width: 60%;
                font-size: 0.8em;
            }
            .user-name {
                margin-left: 2px;
            }
            .profile_details li a i.fa.lnr {
                right: 1%;
            }
            .chit-chat-heading {
                font-size: 1em;
            }
            h3#geoChartTitle {
                font-size: 1.05em;
            }
            div#geoChart {
                height: 135px!important;
            }
            .glocy-chart {
                padding: 1em 1em;
            }
            canvas#bar {
                width: 195px !important;
                height: 150px !important;
            }
            .malorum-top {
                min-height: 100px;
            }
            span.malorum-pro {
                width: 60px;
                height: 60px;
                top: -35px;
                left:83px;
                background-size: 100%;
            }
            .malorm-bottom {
                padding: 1.5em 0.8em;
            }
            .malorm-bottom h2 {
                font-size: 1em;
            }
            .malorm-bottom ul {
                margin-top: 0.5em;
            }
            h3.tlt {
                font-size: 1em;
            }
            .home-progres-main h3 {
                font-size: 1em;
            }
            .prograc-blocks {
                padding: 1em 1em;
            }
            .home-progres-main {
                padding-bottom: 0px;
            }
            .chart-layer2-left h3 {
                font-size: 1em;
            }
            .search-box input[type="text"] {
                width: 80%;
                font-size: 0.95em;
                padding: 0.5em 0.5em;
            }
            canvas#radar {
                width: 195px !important;
                height: 200px !important;
            }
            .climate-gd1top-left h4 {
                font-size: 1em;
            }
            .cloudy1 h4 {
                font-size: 0.8em;
            }
            .cloudy1 h3 {
                font-size: 1em;
            }
            .climate-gd1top-left p {
                font-size: 0.8em;
            }
            .climate-gd1top-right p {
                font-size: 0.8em;
                line-height: 1.8em;
            }
            .climate-grid1 {
                min-height: 317px;
            }
            .climate-grid2 {
                min-height: 170px;
            }
            span.shoppy-rate {
                margin: 0.5em 0.5em;
                width: 55px;
                height: 55px;
            }
            span.shoppy-rate h4 {
                font-size: 1em;
            }
            .shoppy h3 {
                font-size: 1em;
            }
            .popular-bran-left p {
                font-size: 0.78em;
                margin-top: 0.5em;
            }
            .popular-bran-left h4 {
                font-size: 0.7em;
            }
            .popular-bran-left {
                padding: 0.7em 1em;
            }
            .popular-bran-right h3 {
                font-size: 1.5em;
                width: 70px;
                height: 70px;
            }
            .popular-follo-left {
                padding: 0.8em 1em;
            }
            .popular-follo-left p {
                font-size: 0.75em;
            }
            .cols-grids h2 {
                font-size: 1.7em;
                margin-bottom: 0.5em;
            }
            .portlet-grid-page h2 {
                font-size: 1.7em;
                margin-bottom: 0.5em;
            }
            .mb40 {
                margin-bottom: 10px !important;
            }
            .panel-body {
                padding: 10px;
            }
            .copyrights p {
                font-size: 0.8em;
            }
            .btn-main-heading h2 {
                font-size: 1.6em;
                margin-bottom: 0.5em;
            }
            .button-heading h4 {
                font-size: 1.1em;
            }
            .col-lg-6.mb-60 {
                padding: 0px;
            }
            .map-main-page h2 {
                font-size: 1.7em;
            }
            .login-page {
                padding: 1.3em 0em;
            }
            .forgot-top-grids {
                padding: 0em 0em;
            }
            .forgot-grid ul li input[type="checkbox"]+label {
                padding-left: 22px;
                font-size: .65em;
            }
            .login-block input[type="text"], .login-block input[type="password"] {
                font-size: 0.8em;
                padding: 7px 20px;
            }
            .login-block input[type="submit"] {
                font-size: 0.9em;
            }
            .login-block h5 {
                font-size: 0.9em;
            }
            .login-head h1 {
                font-size: 2em;
            }
            .login-head {
                min-height: 130px;
            }
            .login-block h3 {
                font-size: 0.85em;
            }
            .login-block h2 {
                margin: 1em 0;
            }
            .signup-page-main {
                padding: 1.5em 0em;
            }
            .signup-head h1 {
                font-size: 2em;
            }
            .signup-head {
                min-height: 130px;
            }
            .signup-block {
                padding: 1.5em 1.3em;
            }
            .signup-block input[type="text"], .signup-block input[type="password"] {
                font-size: 0.8em;
                padding: 6px 15px;
            }
            .signup-block input[type="submit"] {
                font-size: 0.85em;
            }
            .sign-down {
                margin-top: 10px;
            }
            .sign-down h4 {
                font-size: 0.8em;
            }
            .sign-down h5 {
                font-size: 0.83em;
            }
            canvas#doughnut {
                width: 185px !important;
                height: 180px !important;
            }
            .dygno h2 {
                font-size: 1.3em;
            }
            canvas#line {
                width: 205px !important;
                height: 185px !important;
            }
            .line-chart h3 {
                font-size: 1.3em;
            }
            canvas#polarArea {
                width: 190px !important;
                height: 180px !important;
            }
            .polararea h3 {
                font-size: 1.3em;
            }
            canvas#pie {
                width: 195px !important;
                height: 195px !important;
            }
            .chart-other h3 {
                font-size: 1.3em;
            }
            .inbox h2 {
                font-size: 1.7em;
                margin-bottom: 0.5em;
            }
            .mail-pic {
                width: 35%;
            }
            .mailer-name {
                width: 57%;
            }
            .compose-bottom ul li a {
                font-size: 0.8em;
                padding: 0.8em 1em;
            }
            .compose-right .inbox-details-body {
                padding: 1em;
            }
            .compose-right .alert.alert-info {
                padding: 10px 20px;
                font-size: 0.8em;
            }
            .inbox-details-body textarea {
                font-size: 0.8em;
                height: 7em;
                margin-bottom: 0em;
            }
            .compose-right input[type="submit"] {
                font-size: 0.8em;
                padding: 0.6em 1em;
            }
            .pro-head h2 {
                font-size: 1.7em;
                margin: 0em 0em 0.5em 0em;
            }
            .product-grid {
                float: none;
                width: 100%;
                padding: 0px;
            }
            .prices-head h2 {
                font-size: 1.7em;
                margin: 0em 0em 0.5em 0.4em;
            }
            .error-404 h2 {
                font-size: 1.5em;
            }
            .error-right h4 {
                font-size: 1em;
            }
            .blank h2 {
                font-size: 1.7em;
                margin-bottom: 0.5em;
            }
            .blankpage-main {
                padding: 1em 1em;
                margin-top: 2em;
            }
            .blankpage-main p {
                font-size: 0.8em;
            }
            .boost-icons-head h2 {
                font-size: 1.7em;
                margin-bottom: 0.5em;
            }
            .boost-icons-list ul li {
                width: 100%;
                margin: 0% 1% 2% 0%;
                padding: 2em 0.5em;
            }
            .boost-icons-list ul li {
                font-size: 0.8em;
            }
            .page-container.sidebar-collapsed-back .sidebar-menu {
                width: 55px;
            }
            .sidebar-menu {
                width: 45px;
            }
            .logo {
                left: 7px;
            }
            .page-container.sidebar-collapsed .logo {
                left: 7px;
            }
            #menu li a {
                padding: 15px 10px;
                font-size: 1em;
            }
            ul.dropdown-menu {
                min-width: 195px;
            }
            .profile_details ul li ul.dropdown-menu.drp-mnu {
                min-width: 160px;
            }
            .popular-follo-right h4 {
                font-size: 1em;
            }
            .popular-follo-right h5 {
                font-size: 0.85em;
            }
            .popular-follo-right {
                padding: 1.45em 1em;
            }
            .popular-bran-left h3 {
                font-size: 1em;
            }
            .page-container.sidebar-collapsed .sidebar-menu {
                width: 130px;
            }
            .market-update-block h3 {
                font-size: 1.7em;
            }
            .forgot a {
                font-size: 0.65em;
            }
            .inbox-details-body input[type="text"] {
                font-size: 0.8em;
                height: 33px;
            }
            .forgot a {
                font-size: 0.6em;
            }
            .b_label, .bar_label_min, .bar_label_max, .b_tooltip span {
                font-size: 11px;
            }
            .b_tooltip {
                padding: 4px 7px 7px 7px;
            }
        }
        /*!
 *  Font Awesome 4.5.0 by @davegandy - http://fontawesome.io - @fontawesome
 *  License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
 */
        /* FONT PATH
 * -------------------------- */
        @font-face {
            font-family: 'FontAwesome';
            src: url('../fonts/fontawesome-webfont.eot?v=4.5.0');
            src: url('../fonts/fontawesome-webfont.eot?#iefix&v=4.5.0') format('embedded-opentype'), url('../fonts/fontawesome-webfont.woff2?v=4.5.0') format('woff2'), url('../fonts/fontawesome-webfont.woff?v=4.5.0') format('woff'), url('../fonts/fontawesome-webfont.ttf?v=4.5.0') format('truetype'), url('../fonts/fontawesome-webfont.svg?v=4.5.0#fontawesomeregular') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        .fa {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        /* makes the font 33% larger relative to the icon container */
        .fa-lg {
            font-size: 1.33333333em;
            line-height: 0.75em;
            vertical-align: -15%;
        }
        .fa-2x {
            font-size: 2em;
        }
        .fa-3x {
            font-size: 3em;
        }
        .fa-4x {
            font-size: 4em;
        }
        .fa-5x {
            font-size: 5em;
        }
        .fa-fw {
            width: 1.28571429em;
            text-align: center;
        }
        .fa-ul {
            padding-left: 0;
            margin-left: 2.14285714em;
            list-style-type: none;
        }
        .fa-ul > li {
            position: relative;
        }
        .fa-li {
            position: absolute;
            left: -2.14285714em;
            width: 2.14285714em;
            top: 0.14285714em;
            text-align: center;
        }
        .fa-li.fa-lg {
            left: -1.85714286em;
        }
        .fa-border {
            padding: .2em .25em .15em;
            border: solid 0.08em #eeeeee;
            border-radius: .1em;
        }
        .fa-pull-left {
            float: left;
        }
        .fa-pull-right {
            float: right;
        }
        .fa.fa-pull-left {
            margin-right: .3em;
        }
        .fa.fa-pull-right {
            margin-left: .3em;
        }
        /* Deprecated as of 4.4.0 */
        .pull-right {
            float: right;
        }
        .pull-left {
            float: left;
        }
        .fa.pull-left {
            margin-right: .3em;
        }
        .fa.pull-right {
            margin-left: .3em;
        }
        .fa-spin {
            -webkit-animation: fa-spin 2s infinite linear;
            animation: fa-spin 2s infinite linear;
        }
        .fa-pulse {
            -webkit-animation: fa-spin 1s infinite steps(8);
            animation: fa-spin 1s infinite steps(8);
        }
        @-webkit-keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg);
            }
        }
        @keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg);
            }
        }
        .fa-rotate-90 {
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1);
            -webkit-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            transform: rotate(90deg);
        }
        .fa-rotate-180 {
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg);
        }
        .fa-rotate-270 {
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
            -webkit-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            transform: rotate(270deg);
        }
        .fa-flip-horizontal {
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1);
            -webkit-transform: scale(-1, 1);
            -ms-transform: scale(-1, 1);
            transform: scale(-1, 1);
        }
        .fa-flip-vertical {
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1);
            -webkit-transform: scale(1, -1);
            -ms-transform: scale(1, -1);
            transform: scale(1, -1);
        }
        :root .fa-rotate-90,
        :root .fa-rotate-180,
        :root .fa-rotate-270,
        :root .fa-flip-horizontal,
        :root .fa-flip-vertical {
            filter: none;
        }
        .fa-stack {
            position: relative;
            display: inline-block;
            width: 2em;
            height: 2em;
            line-height: 2em;
            vertical-align: middle;
        }
        .fa-stack-1x,
        .fa-stack-2x {
            position: absolute;
            left: 0;
            width: 100%;
            text-align: center;
        }
        .fa-stack-1x {
            line-height: inherit;
        }
        .fa-stack-2x {
            font-size: 2em;
        }
        .fa-inverse {
            color: #ffffff;
        }
        /* Font Awesome uses the Unicode Private Use Area (PUA) to ensure screen
   readers do not read off random characters that represent icons */
        .fa-glass:before {
            content: "\f000";
        }
        .fa-music:before {
            content: "\f001";
        }
        .fa-search:before {
            content: "\f002";
        }
        .fa-envelope-o:before {
            content: "\f003";
        }
        .fa-heart:before {
            content: "\f004";
        }
        .fa-star:before {
            content: "\f005";
        }
        .fa-star-o:before {
            content: "\f006";
        }
        .fa-user:before {
            content: "\f007";
        }
        .fa-film:before {
            content: "\f008";
        }
        .fa-th-large:before {
            content: "\f009";
        }
        .fa-th:before {
            content: "\f00a";
        }
        .fa-th-list:before {
            content: "\f00b";
        }
        .fa-check:before {
            content: "\f00c";
        }
        .fa-remove:before,
        .fa-close:before,
        .fa-times:before {
            content: "\f00d";
        }
        .fa-search-plus:before {
            content: "\f00e";
        }
        .fa-search-minus:before {
            content: "\f010";
        }
        .fa-power-off:before {
            content: "\f011";
        }
        .fa-signal:before {
            content: "\f012";
        }
        .fa-gear:before,
        .fa-cog:before {
            content: "\f013";
        }
        .fa-trash-o:before {
            content: "\f014";
        }
        .fa-home:before {
            content: "\f015";
        }
        .fa-file-o:before {
            content: "\f016";
        }
        .fa-clock-o:before {
            content: "\f017";
        }
        .fa-road:before {
            content: "\f018";
        }
        .fa-download:before {
            content: "\f019";
        }
        .fa-arrow-circle-o-down:before {
            content: "\f01a";
        }
        .fa-arrow-circle-o-up:before {
            content: "\f01b";
        }
        .fa-inbox:before {
            content: "\f01c";
        }
        .fa-play-circle-o:before {
            content: "\f01d";
        }
        .fa-rotate-right:before,
        .fa-repeat:before {
            content: "\f01e";
        }
        .fa-refresh:before {
            content: "\f021";
        }
        .fa-list-alt:before {
            content: "\f022";
        }
        .fa-lock:before {
            content: "\f023";
        }
        .fa-flag:before {
            content: "\f024";
        }
        .fa-headphones:before {
            content: "\f025";
        }
        .fa-volume-off:before {
            content: "\f026";
        }
        .fa-volume-down:before {
            content: "\f027";
        }
        .fa-volume-up:before {
            content: "\f028";
        }
        .fa-qrcode:before {
            content: "\f029";
        }
        .fa-barcode:before {
            content: "\f02a";
        }
        .fa-tag:before {
            content: "\f02b";
        }
        .fa-tags:before {
            content: "\f02c";
        }
        .fa-book:before {
            content: "\f02d";
        }
        .fa-bookmark:before {
            content: "\f02e";
        }
        .fa-print:before {
            content: "\f02f";
        }
        .fa-camera:before {
            content: "\f030";
        }
        .fa-font:before {
            content: "\f031";
        }
        .fa-bold:before {
            content: "\f032";
        }
        .fa-italic:before {
            content: "\f033";
        }
        .fa-text-height:before {
            content: "\f034";
        }
        .fa-text-width:before {
            content: "\f035";
        }
        .fa-align-left:before {
            content: "\f036";
        }
        .fa-align-center:before {
            content: "\f037";
        }
        .fa-align-right:before {
            content: "\f038";
        }
        .fa-align-justify:before {
            content: "\f039";
        }
        .fa-list:before {
            content: "\f03a";
        }
        .fa-dedent:before,
        .fa-outdent:before {
            content: "\f03b";
        }
        .fa-indent:before {
            content: "\f03c";
        }
        .fa-video-camera:before {
            content: "\f03d";
        }
        .fa-photo:before,
        .fa-image:before,
        .fa-picture-o:before {
            content: "\f03e";
        }
        .fa-pencil:before {
            content: "\f040";
        }
        .fa-map-marker:before {
            content: "\f041";
        }
        .fa-adjust:before {
            content: "\f042";
        }
        .fa-tint:before {
            content: "\f043";
        }
        .fa-edit:before,
        .fa-pencil-square-o:before {
            content: "\f044";
        }
        .fa-share-square-o:before {
            content: "\f045";
        }
        .fa-check-square-o:before {
            content: "\f046";
        }
        .fa-arrows:before {
            content: "\f047";
        }
        .fa-step-backward:before {
            content: "\f048";
        }
        .fa-fast-backward:before {
            content: "\f049";
        }
        .fa-backward:before {
            content: "\f04a";
        }
        .fa-play:before {
            content: "\f04b";
        }
        .fa-pause:before {
            content: "\f04c";
        }
        .fa-stop:before {
            content: "\f04d";
        }
        .fa-forward:before {
            content: "\f04e";
        }
        .fa-fast-forward:before {
            content: "\f050";
        }
        .fa-step-forward:before {
            content: "\f051";
        }
        .fa-eject:before {
            content: "\f052";
        }
        .fa-chevron-left:before {
            content: "\f053";
        }
        .fa-chevron-right:before {
            content: "\f054";
        }
        .fa-plus-circle:before {
            content: "\f055";
        }
        .fa-minus-circle:before {
            content: "\f056";
        }
        .fa-times-circle:before {
            content: "\f057";
        }
        .fa-check-circle:before {
            content: "\f058";
        }
        .fa-question-circle:before {
            content: "\f059";
        }
        .fa-info-circle:before {
            content: "\f05a";
        }
        .fa-crosshairs:before {
            content: "\f05b";
        }
        .fa-times-circle-o:before {
            content: "\f05c";
        }
        .fa-check-circle-o:before {
            content: "\f05d";
        }
        .fa-ban:before {
            content: "\f05e";
        }
        .fa-arrow-left:before {
            content: "\f060";
        }
        .fa-arrow-right:before {
            content: "\f061";
        }
        .fa-arrow-up:before {
            content: "\f062";
        }
        .fa-arrow-down:before {
            content: "\f063";
        }
        .fa-mail-forward:before,
        .fa-share:before {
            content: "\f064";
        }
        .fa-expand:before {
            content: "\f065";
        }
        .fa-compress:before {
            content: "\f066";
        }
        .fa-plus:before {
            content: "\f067";
        }
        .fa-minus:before {
            content: "\f068";
        }
        .fa-asterisk:before {
            content: "\f069";
        }
        .fa-exclamation-circle:before {
            content: "\f06a";
        }
        .fa-gift:before {
            content: "\f06b";
        }
        .fa-leaf:before {
            content: "\f06c";
        }
        .fa-fire:before {
            content: "\f06d";
        }
        .fa-eye:before {
            content: "\f06e";
        }
        .fa-eye-slash:before {
            content: "\f070";
        }
        .fa-warning:before,
        .fa-exclamation-triangle:before {
            content: "\f071";
        }
        .fa-plane:before {
            content: "\f072";
        }
        .fa-calendar:before {
            content: "\f073";
        }
        .fa-random:before {
            content: "\f074";
        }
        .fa-comment:before {
            content: "\f075";
        }
        .fa-magnet:before {
            content: "\f076";
        }
        .fa-chevron-up:before {
            content: "\f077";
        }
        .fa-chevron-down:before {
            content: "\f078";
        }
        .fa-retweet:before {
            content: "\f079";
        }
        .fa-shopping-cart:before {
            content: "\f07a";
        }
        .fa-folder:before {
            content: "\f07b";
        }
        .fa-folder-open:before {
            content: "\f07c";
        }
        .fa-arrows-v:before {
            content: "\f07d";
        }
        .fa-arrows-h:before {
            content: "\f07e";
        }
        .fa-bar-chart-o:before,
        .fa-bar-chart:before {
            content: "\f080";
        }
        .fa-twitter-square:before {
            content: "\f081";
        }
        .fa-facebook-square:before {
            content: "\f082";
        }
        .fa-camera-retro:before {
            content: "\f083";
        }
        .fa-key:before {
            content: "\f084";
        }
        .fa-gears:before,
        .fa-cogs:before {
            content: "\f085";
        }
        .fa-comments:before {
            content: "\f086";
        }
        .fa-thumbs-o-up:before {
            content: "\f087";
        }
        .fa-thumbs-o-down:before {
            content: "\f088";
        }
        .fa-star-half:before {
            content: "\f089";
        }
        .fa-heart-o:before {
            content: "\f08a";
        }
        .fa-sign-out:before {
            content: "\f08b";
        }
        .fa-linkedin-square:before {
            content: "\f08c";
        }
        .fa-thumb-tack:before {
            content: "\f08d";
        }
        .fa-external-link:before {
            content: "\f08e";
        }
        .fa-sign-in:before {
            content: "\f090";
        }
        .fa-trophy:before {
            content: "\f091";
        }
        .fa-github-square:before {
            content: "\f092";
        }
        .fa-upload:before {
            content: "\f093";
        }
        .fa-lemon-o:before {
            content: "\f094";
        }
        .fa-phone:before {
            content: "\f095";
        }
        .fa-square-o:before {
            content: "\f096";
        }
        .fa-bookmark-o:before {
            content: "\f097";
        }
        .fa-phone-square:before {
            content: "\f098";
        }
        .fa-twitter:before {
            content: "\f099";
        }
        .fa-facebook-f:before,
        .fa-facebook:before {
            content: "\f09a";
        }
        .fa-github:before {
            content: "\f09b";
        }
        .fa-unlock:before {
            content: "\f09c";
        }
        .fa-credit-card:before {
            content: "\f09d";
        }
        .fa-feed:before,
        .fa-rss:before {
            content: "\f09e";
        }
        .fa-hdd-o:before {
            content: "\f0a0";
        }
        .fa-bullhorn:before {
            content: "\f0a1";
        }
        .fa-bell:before {
            content: "\f0f3";
        }
        .fa-certificate:before {
            content: "\f0a3";
        }
        .fa-hand-o-right:before {
            content: "\f0a4";
        }
        .fa-hand-o-left:before {
            content: "\f0a5";
        }
        .fa-hand-o-up:before {
            content: "\f0a6";
        }
        .fa-hand-o-down:before {
            content: "\f0a7";
        }
        .fa-arrow-circle-left:before {
            content: "\f0a8";
        }
        .fa-arrow-circle-right:before {
            content: "\f0a9";
        }
        .fa-arrow-circle-up:before {
            content: "\f0aa";
        }
        .fa-arrow-circle-down:before {
            content: "\f0ab";
        }
        .fa-globe:before {
            content: "\f0ac";
        }
        .fa-wrench:before {
            content: "\f0ad";
        }
        .fa-tasks:before {
            content: "\f0ae";
        }
        .fa-filter:before {
            content: "\f0b0";
        }
        .fa-briefcase:before {
            content: "\f0b1";
        }
        .fa-arrows-alt:before {
            content: "\f0b2";
        }
        .fa-group:before,
        .fa-users:before {
            content: "\f0c0";
        }
        .fa-chain:before,
        .fa-link:before {
            content: "\f0c1";
        }
        .fa-cloud:before {
            content: "\f0c2";
        }
        .fa-flask:before {
            content: "\f0c3";
        }
        .fa-cut:before,
        .fa-scissors:before {
            content: "\f0c4";
        }
        .fa-copy:before,
        .fa-files-o:before {
            content: "\f0c5";
        }
        .fa-paperclip:before {
            content: "\f0c6";
        }
        .fa-save:before,
        .fa-floppy-o:before {
            content: "\f0c7";
        }
        .fa-square:before {
            content: "\f0c8";
        }
        .fa-navicon:before,
        .fa-reorder:before,
        .fa-bars:before {
            content: "\f0c9";
        }
        .fa-list-ul:before {
            content: "\f0ca";
        }
        .fa-list-ol:before {
            content: "\f0cb";
        }
        .fa-strikethrough:before {
            content: "\f0cc";
        }
        .fa-underline:before {
            content: "\f0cd";
        }
        .fa-table:before {
            content: "\f0ce";
        }
        .fa-magic:before {
            content: "\f0d0";
        }
        .fa-truck:before {
            content: "\f0d1";
        }
        .fa-pinterest:before {
            content: "\f0d2";
        }
        .fa-pinterest-square:before {
            content: "\f0d3";
        }
        .fa-google-plus-square:before {
            content: "\f0d4";
        }
        .fa-google-plus:before {
            content: "\f0d5";
        }
        .fa-money:before {
            content: "\f0d6";
        }
        .fa-caret-down:before {
            content: "\f0d7";
        }
        .fa-caret-up:before {
            content: "\f0d8";
        }
        .fa-caret-left:before {
            content: "\f0d9";
        }
        .fa-caret-right:before {
            content: "\f0da";
        }
        .fa-columns:before {
            content: "\f0db";
        }
        .fa-unsorted:before,
        .fa-sort:before {
            content: "\f0dc";
        }
        .fa-sort-down:before,
        .fa-sort-desc:before {
            content: "\f0dd";
        }
        .fa-sort-up:before,
        .fa-sort-asc:before {
            content: "\f0de";
        }
        .fa-envelope:before {
            content: "\f0e0";
        }
        .fa-linkedin:before {
            content: "\f0e1";
        }
        .fa-rotate-left:before,
        .fa-undo:before {
            content: "\f0e2";
        }
        .fa-legal:before,
        .fa-gavel:before {
            content: "\f0e3";
        }
        .fa-dashboard:before,
        .fa-tachometer:before {
            content: "\f0e4";
        }
        .fa-comment-o:before {
            content: "\f0e5";
        }
        .fa-comments-o:before {
            content: "\f0e6";
        }
        .fa-flash:before,
        .fa-bolt:before {
            content: "\f0e7";
        }
        .fa-sitemap:before {
            content: "\f0e8";
        }
        .fa-umbrella:before {
            content: "\f0e9";
        }
        .fa-paste:before,
        .fa-clipboard:before {
            content: "\f0ea";
        }
        .fa-lightbulb-o:before {
            content: "\f0eb";
        }
        .fa-exchange:before {
            content: "\f0ec";
        }
        .fa-cloud-download:before {
            content: "\f0ed";
        }
        .fa-cloud-upload:before {
            content: "\f0ee";
        }
        .fa-user-md:before {
            content: "\f0f0";
        }
        .fa-stethoscope:before {
            content: "\f0f1";
        }
        .fa-suitcase:before {
            content: "\f0f2";
        }
        .fa-bell-o:before {
            content: "\f0a2";
        }
        .fa-coffee:before {
            content: "\f0f4";
        }
        .fa-cutlery:before {
            content: "\f0f5";
        }
        .fa-file-text-o:before {
            content: "\f0f6";
        }
        .fa-building-o:before {
            content: "\f0f7";
        }
        .fa-hospital-o:before {
            content: "\f0f8";
        }
        .fa-ambulance:before {
            content: "\f0f9";
        }
        .fa-medkit:before {
            content: "\f0fa";
        }
        .fa-fighter-jet:before {
            content: "\f0fb";
        }
        .fa-beer:before {
            content: "\f0fc";
        }
        .fa-h-square:before {
            content: "\f0fd";
        }
        .fa-plus-square:before {
            content: "\f0fe";
        }
        .fa-angle-double-left:before {
            content: "\f100";
        }
        .fa-angle-double-right:before {
            content: "\f101";
        }
        .fa-angle-double-up:before {
            content: "\f102";
        }
        .fa-angle-double-down:before {
            content: "\f103";
        }
        .fa-angle-left:before {
            content: "\f104";
        }
        .fa-angle-right:before {
            content: "\f105";
        }
        .fa-angle-up:before {
            content: "\f106";
        }
        .fa-angle-down:before {
            content: "\f107";
        }
        .fa-desktop:before {
            content: "\f108";
        }
        .fa-laptop:before {
            content: "\f109";
        }
        .fa-tablet:before {
            content: "\f10a";
        }
        .fa-mobile-phone:before,
        .fa-mobile:before {
            content: "\f10b";
        }
        .fa-circle-o:before {
            content: "\f10c";
        }
        .fa-quote-left:before {
            content: "\f10d";
        }
        .fa-quote-right:before {
            content: "\f10e";
        }
        .fa-spinner:before {
            content: "\f110";
        }
        .fa-circle:before {
            content: "\f111";
        }
        .fa-mail-reply:before,
        .fa-reply:before {
            content: "\f112";
        }
        .fa-github-alt:before {
            content: "\f113";
        }
        .fa-folder-o:before {
            content: "\f114";
        }
        .fa-folder-open-o:before {
            content: "\f115";
        }
        .fa-smile-o:before {
            content: "\f118";
        }
        .fa-frown-o:before {
            content: "\f119";
        }
        .fa-meh-o:before {
            content: "\f11a";
        }
        .fa-gamepad:before {
            content: "\f11b";
        }
        .fa-keyboard-o:before {
            content: "\f11c";
        }
        .fa-flag-o:before {
            content: "\f11d";
        }
        .fa-flag-checkered:before {
            content: "\f11e";
        }
        .fa-terminal:before {
            content: "\f120";
        }
        .fa-code:before {
            content: "\f121";
        }
        .fa-mail-reply-all:before,
        .fa-reply-all:before {
            content: "\f122";
        }
        .fa-star-half-empty:before,
        .fa-star-half-full:before,
        .fa-star-half-o:before {
            content: "\f123";
        }
        .fa-location-arrow:before {
            content: "\f124";
        }
        .fa-crop:before {
            content: "\f125";
        }
        .fa-code-fork:before {
            content: "\f126";
        }
        .fa-unlink:before,
        .fa-chain-broken:before {
            content: "\f127";
        }
        .fa-question:before {
            content: "\f128";
        }
        .fa-info:before {
            content: "\f129";
        }
        .fa-exclamation:before {
            content: "\f12a";
        }
        .fa-superscript:before {
            content: "\f12b";
        }
        .fa-subscript:before {
            content: "\f12c";
        }
        .fa-eraser:before {
            content: "\f12d";
        }
        .fa-puzzle-piece:before {
            content: "\f12e";
        }
        .fa-microphone:before {
            content: "\f130";
        }
        .fa-microphone-slash:before {
            content: "\f131";
        }
        .fa-shield:before {
            content: "\f132";
        }
        .fa-calendar-o:before {
            content: "\f133";
        }
        .fa-fire-extinguisher:before {
            content: "\f134";
        }
        .fa-rocket:before {
            content: "\f135";
        }
        .fa-maxcdn:before {
            content: "\f136";
        }
        .fa-chevron-circle-left:before {
            content: "\f137";
        }
        .fa-chevron-circle-right:before {
            content: "\f138";
        }
        .fa-chevron-circle-up:before {
            content: "\f139";
        }
        .fa-chevron-circle-down:before {
            content: "\f13a";
        }
        .fa-html5:before {
            content: "\f13b";
        }
        .fa-css3:before {
            content: "\f13c";
        }
        .fa-anchor:before {
            content: "\f13d";
        }
        .fa-unlock-alt:before {
            content: "\f13e";
        }
        .fa-bullseye:before {
            content: "\f140";
        }
        .fa-ellipsis-h:before {
            content: "\f141";
        }
        .fa-ellipsis-v:before {
            content: "\f142";
        }
        .fa-rss-square:before {
            content: "\f143";
        }
        .fa-play-circle:before {
            content: "\f144";
        }
        .fa-ticket:before {
            content: "\f145";
        }
        .fa-minus-square:before {
            content: "\f146";
        }
        .fa-minus-square-o:before {
            content: "\f147";
        }
        .fa-level-up:before {
            content: "\f148";
        }
        .fa-level-down:before {
            content: "\f149";
        }
        .fa-check-square:before {
            content: "\f14a";
        }
        .fa-pencil-square:before {
            content: "\f14b";
        }
        .fa-external-link-square:before {
            content: "\f14c";
        }
        .fa-share-square:before {
            content: "\f14d";
        }
        .fa-compass:before {
            content: "\f14e";
        }
        .fa-toggle-down:before,
        .fa-caret-square-o-down:before {
            content: "\f150";
        }
        .fa-toggle-up:before,
        .fa-caret-square-o-up:before {
            content: "\f151";
        }
        .fa-toggle-right:before,
        .fa-caret-square-o-right:before {
            content: "\f152";
        }
        .fa-euro:before,
        .fa-eur:before {
            content: "\f153";
        }
        .fa-gbp:before {
            content: "\f154";
        }
        .fa-dollar:before,
        .fa-usd:before {
            content: "\f155";
        }
        .fa-rupee:before,
        .fa-inr:before {
            content: "\f156";
        }
        .fa-cny:before,
        .fa-rmb:before,
        .fa-yen:before,
        .fa-jpy:before {
            content: "\f157";
        }
        .fa-ruble:before,
        .fa-rouble:before,
        .fa-rub:before {
            content: "\f158";
        }
        .fa-won:before,
        .fa-krw:before {
            content: "\f159";
        }
        .fa-bitcoin:before,
        .fa-btc:before {
            content: "\f15a";
        }
        .fa-file:before {
            content: "\f15b";
        }
        .fa-file-text:before {
            content: "\f15c";
        }
        .fa-sort-alpha-asc:before {
            content: "\f15d";
        }
        .fa-sort-alpha-desc:before {
            content: "\f15e";
        }
        .fa-sort-amount-asc:before {
            content: "\f160";
        }
        .fa-sort-amount-desc:before {
            content: "\f161";
        }
        .fa-sort-numeric-asc:before {
            content: "\f162";
        }
        .fa-sort-numeric-desc:before {
            content: "\f163";
        }
        .fa-thumbs-up:before {
            content: "\f164";
        }
        .fa-thumbs-down:before {
            content: "\f165";
        }
        .fa-youtube-square:before {
            content: "\f166";
        }
        .fa-youtube:before {
            content: "\f167";
        }
        .fa-xing:before {
            content: "\f168";
        }
        .fa-xing-square:before {
            content: "\f169";
        }
        .fa-youtube-play:before {
            content: "\f16a";
        }
        .fa-dropbox:before {
            content: "\f16b";
        }
        .fa-stack-overflow:before {
            content: "\f16c";
        }
        .fa-instagram:before {
            content: "\f16d";
        }
        .fa-flickr:before {
            content: "\f16e";
        }
        .fa-adn:before {
            content: "\f170";
        }
        .fa-bitbucket:before {
            content: "\f171";
        }
        .fa-bitbucket-square:before {
            content: "\f172";
        }
        .fa-tumblr:before {
            content: "\f173";
        }
        .fa-tumblr-square:before {
            content: "\f174";
        }
        .fa-long-arrow-down:before {
            content: "\f175";
        }
        .fa-long-arrow-up:before {
            content: "\f176";
        }
        .fa-long-arrow-left:before {
            content: "\f177";
        }
        .fa-long-arrow-right:before {
            content: "\f178";
        }
        .fa-apple:before {
            content: "\f179";
        }
        .fa-windows:before {
            content: "\f17a";
        }
        .fa-android:before {
            content: "\f17b";
        }
        .fa-linux:before {
            content: "\f17c";
        }
        .fa-dribbble:before {
            content: "\f17d";
        }
        .fa-skype:before {
            content: "\f17e";
        }
        .fa-foursquare:before {
            content: "\f180";
        }
        .fa-trello:before {
            content: "\f181";
        }
        .fa-female:before {
            content: "\f182";
        }
        .fa-male:before {
            content: "\f183";
        }
        .fa-gittip:before,
        .fa-gratipay:before {
            content: "\f184";
        }
        .fa-sun-o:before {
            content: "\f185";
        }
        .fa-moon-o:before {
            content: "\f186";
        }
        .fa-archive:before {
            content: "\f187";
        }
        .fa-bug:before {
            content: "\f188";
        }
        .fa-vk:before {
            content: "\f189";
        }
        .fa-weibo:before {
            content: "\f18a";
        }
        .fa-renren:before {
            content: "\f18b";
        }
        .fa-pagelines:before {
            content: "\f18c";
        }
        .fa-stack-exchange:before {
            content: "\f18d";
        }
        .fa-arrow-circle-o-right:before {
            content: "\f18e";
        }
        .fa-arrow-circle-o-left:before {
            content: "\f190";
        }
        .fa-toggle-left:before,
        .fa-caret-square-o-left:before {
            content: "\f191";
        }
        .fa-dot-circle-o:before {
            content: "\f192";
        }
        .fa-wheelchair:before {
            content: "\f193";
        }
        .fa-vimeo-square:before {
            content: "\f194";
        }
        .fa-turkish-lira:before,
        .fa-try:before {
            content: "\f195";
        }
        .fa-plus-square-o:before {
            content: "\f196";
        }
        .fa-space-shuttle:before {
            content: "\f197";
        }
        .fa-slack:before {
            content: "\f198";
        }
        .fa-envelope-square:before {
            content: "\f199";
        }
        .fa-wordpress:before {
            content: "\f19a";
        }
        .fa-openid:before {
            content: "\f19b";
        }
        .fa-institution:before,
        .fa-bank:before,
        .fa-university:before {
            content: "\f19c";
        }
        .fa-mortar-board:before,
        .fa-graduation-cap:before {
            content: "\f19d";
        }
        .fa-yahoo:before {
            content: "\f19e";
        }
        .fa-google:before {
            content: "\f1a0";
        }
        .fa-reddit:before {
            content: "\f1a1";
        }
        .fa-reddit-square:before {
            content: "\f1a2";
        }
        .fa-stumbleupon-circle:before {
            content: "\f1a3";
        }
        .fa-stumbleupon:before {
            content: "\f1a4";
        }
        .fa-delicious:before {
            content: "\f1a5";
        }
        .fa-digg:before {
            content: "\f1a6";
        }
        .fa-pied-piper:before {
            content: "\f1a7";
        }
        .fa-pied-piper-alt:before {
            content: "\f1a8";
        }
        .fa-drupal:before {
            content: "\f1a9";
        }
        .fa-joomla:before {
            content: "\f1aa";
        }
        .fa-language:before {
            content: "\f1ab";
        }
        .fa-fax:before {
            content: "\f1ac";
        }
        .fa-building:before {
            content: "\f1ad";
        }
        .fa-child:before {
            content: "\f1ae";
        }
        .fa-paw:before {
            content: "\f1b0";
        }
        .fa-spoon:before {
            content: "\f1b1";
        }
        .fa-cube:before {
            content: "\f1b2";
        }
        .fa-cubes:before {
            content: "\f1b3";
        }
        .fa-behance:before {
            content: "\f1b4";
        }
        .fa-behance-square:before {
            content: "\f1b5";
        }
        .fa-steam:before {
            content: "\f1b6";
        }
        .fa-steam-square:before {
            content: "\f1b7";
        }
        .fa-recycle:before {
            content: "\f1b8";
        }
        .fa-automobile:before,
        .fa-car:before {
            content: "\f1b9";
        }
        .fa-cab:before,
        .fa-taxi:before {
            content: "\f1ba";
        }
        .fa-tree:before {
            content: "\f1bb";
        }
        .fa-spotify:before {
            content: "\f1bc";
        }
        .fa-deviantart:before {
            content: "\f1bd";
        }
        .fa-soundcloud:before {
            content: "\f1be";
        }
        .fa-database:before {
            content: "\f1c0";
        }
        .fa-file-pdf-o:before {
            content: "\f1c1";
        }
        .fa-file-word-o:before {
            content: "\f1c2";
        }
        .fa-file-excel-o:before {
            content: "\f1c3";
        }
        .fa-file-powerpoint-o:before {
            content: "\f1c4";
        }
        .fa-file-photo-o:before,
        .fa-file-picture-o:before,
        .fa-file-image-o:before {
            content: "\f1c5";
        }
        .fa-file-zip-o:before,
        .fa-file-archive-o:before {
            content: "\f1c6";
        }
        .fa-file-sound-o:before,
        .fa-file-audio-o:before {
            content: "\f1c7";
        }
        .fa-file-movie-o:before,
        .fa-file-video-o:before {
            content: "\f1c8";
        }
        .fa-file-code-o:before {
            content: "\f1c9";
        }
        .fa-vine:before {
            content: "\f1ca";
        }
        .fa-codepen:before {
            content: "\f1cb";
        }
        .fa-jsfiddle:before {
            content: "\f1cc";
        }
        .fa-life-bouy:before,
        .fa-life-buoy:before,
        .fa-life-saver:before,
        .fa-support:before,
        .fa-life-ring:before {
            content: "\f1cd";
        }
        .fa-circle-o-notch:before {
            content: "\f1ce";
        }
        .fa-ra:before,
        .fa-rebel:before {
            content: "\f1d0";
        }
        .fa-ge:before,
        .fa-empire:before {
            content: "\f1d1";
        }
        .fa-git-square:before {
            content: "\f1d2";
        }
        .fa-git:before {
            content: "\f1d3";
        }
        .fa-y-combinator-square:before,
        .fa-yc-square:before,
        .fa-hacker-news:before {
            content: "\f1d4";
        }
        .fa-tencent-weibo:before {
            content: "\f1d5";
        }
        .fa-qq:before {
            content: "\f1d6";
        }
        .fa-wechat:before,
        .fa-weixin:before {
            content: "\f1d7";
        }
        .fa-send:before,
        .fa-paper-plane:before {
            content: "\f1d8";
        }
        .fa-send-o:before,
        .fa-paper-plane-o:before {
            content: "\f1d9";
        }
        .fa-history:before {
            content: "\f1da";
        }
        .fa-circle-thin:before {
            content: "\f1db";
        }
        .fa-header:before {
            content: "\f1dc";
        }
        .fa-paragraph:before {
            content: "\f1dd";
        }
        .fa-sliders:before {
            content: "\f1de";
        }
        .fa-share-alt:before {
            content: "\f1e0";
        }
        .fa-share-alt-square:before {
            content: "\f1e1";
        }
        .fa-bomb:before {
            content: "\f1e2";
        }
        .fa-soccer-ball-o:before,
        .fa-futbol-o:before {
            content: "\f1e3";
        }
        .fa-tty:before {
            content: "\f1e4";
        }
        .fa-binoculars:before {
            content: "\f1e5";
        }
        .fa-plug:before {
            content: "\f1e6";
        }
        .fa-slideshare:before {
            content: "\f1e7";
        }
        .fa-twitch:before {
            content: "\f1e8";
        }
        .fa-yelp:before {
            content: "\f1e9";
        }
        .fa-newspaper-o:before {
            content: "\f1ea";
        }
        .fa-wifi:before {
            content: "\f1eb";
        }
        .fa-calculator:before {
            content: "\f1ec";
        }
        .fa-paypal:before {
            content: "\f1ed";
        }
        .fa-google-wallet:before {
            content: "\f1ee";
        }
        .fa-cc-visa:before {
            content: "\f1f0";
        }
        .fa-cc-mastercard:before {
            content: "\f1f1";
        }
        .fa-cc-discover:before {
            content: "\f1f2";
        }
        .fa-cc-amex:before {
            content: "\f1f3";
        }
        .fa-cc-paypal:before {
            content: "\f1f4";
        }
        .fa-cc-stripe:before {
            content: "\f1f5";
        }
        .fa-bell-slash:before {
            content: "\f1f6";
        }
        .fa-bell-slash-o:before {
            content: "\f1f7";
        }
        .fa-trash:before {
            content: "\f1f8";
        }
        .fa-copyright:before {
            content: "\f1f9";
        }
        .fa-at:before {
            content: "\f1fa";
        }
        .fa-eyedropper:before {
            content: "\f1fb";
        }
        .fa-paint-brush:before {
            content: "\f1fc";
        }
        .fa-birthday-cake:before {
            content: "\f1fd";
        }
        .fa-area-chart:before {
            content: "\f1fe";
        }
        .fa-pie-chart:before {
            content: "\f200";
        }
        .fa-line-chart:before {
            content: "\f201";
        }
        .fa-lastfm:before {
            content: "\f202";
        }
        .fa-lastfm-square:before {
            content: "\f203";
        }
        .fa-toggle-off:before {
            content: "\f204";
        }
        .fa-toggle-on:before {
            content: "\f205";
        }
        .fa-bicycle:before {
            content: "\f206";
        }
        .fa-bus:before {
            content: "\f207";
        }
        .fa-ioxhost:before {
            content: "\f208";
        }
        .fa-angellist:before {
            content: "\f209";
        }
        .fa-cc:before {
            content: "\f20a";
        }
        .fa-shekel:before,
        .fa-sheqel:before,
        .fa-ils:before {
            content: "\f20b";
        }
        .fa-meanpath:before {
            content: "\f20c";
        }
        .fa-buysellads:before {
            content: "\f20d";
        }
        .fa-connectdevelop:before {
            content: "\f20e";
        }
        .fa-dashcube:before {
            content: "\f210";
        }
        .fa-forumbee:before {
            content: "\f211";
        }
        .fa-leanpub:before {
            content: "\f212";
        }
        .fa-sellsy:before {
            content: "\f213";
        }
        .fa-shirtsinbulk:before {
            content: "\f214";
        }
        .fa-simplybuilt:before {
            content: "\f215";
        }
        .fa-skyatlas:before {
            content: "\f216";
        }
        .fa-cart-plus:before {
            content: "\f217";
        }
        .fa-cart-arrow-down:before {
            content: "\f218";
        }
        .fa-diamond:before {
            content: "\f219";
        }
        .fa-ship:before {
            content: "\f21a";
        }
        .fa-user-secret:before {
            content: "\f21b";
        }
        .fa-motorcycle:before {
            content: "\f21c";
        }
        .fa-street-view:before {
            content: "\f21d";
        }
        .fa-heartbeat:before {
            content: "\f21e";
        }
        .fa-venus:before {
            content: "\f221";
        }
        .fa-mars:before {
            content: "\f222";
        }
        .fa-mercury:before {
            content: "\f223";
        }
        .fa-intersex:before,
        .fa-transgender:before {
            content: "\f224";
        }
        .fa-transgender-alt:before {
            content: "\f225";
        }
        .fa-venus-double:before {
            content: "\f226";
        }
        .fa-mars-double:before {
            content: "\f227";
        }
        .fa-venus-mars:before {
            content: "\f228";
        }
        .fa-mars-stroke:before {
            content: "\f229";
        }
        .fa-mars-stroke-v:before {
            content: "\f22a";
        }
        .fa-mars-stroke-h:before {
            content: "\f22b";
        }
        .fa-neuter:before {
            content: "\f22c";
        }
        .fa-genderless:before {
            content: "\f22d";
        }
        .fa-facebook-official:before {
            content: "\f230";
        }
        .fa-pinterest-p:before {
            content: "\f231";
        }
        .fa-whatsapp:before {
            content: "\f232";
        }
        .fa-server:before {
            content: "\f233";
        }
        .fa-user-plus:before {
            content: "\f234";
        }
        .fa-user-times:before {
            content: "\f235";
        }
        .fa-hotel:before,
        .fa-bed:before {
            content: "\f236";
        }
        .fa-viacoin:before {
            content: "\f237";
        }
        .fa-train:before {
            content: "\f238";
        }
        .fa-subway:before {
            content: "\f239";
        }
        .fa-medium:before {
            content: "\f23a";
        }
        .fa-yc:before,
        .fa-y-combinator:before {
            content: "\f23b";
        }
        .fa-optin-monster:before {
            content: "\f23c";
        }
        .fa-opencart:before {
            content: "\f23d";
        }
        .fa-expeditedssl:before {
            content: "\f23e";
        }
        .fa-battery-4:before,
        .fa-battery-full:before {
            content: "\f240";
        }
        .fa-battery-3:before,
        .fa-battery-three-quarters:before {
            content: "\f241";
        }
        .fa-battery-2:before,
        .fa-battery-half:before {
            content: "\f242";
        }
        .fa-battery-1:before,
        .fa-battery-quarter:before {
            content: "\f243";
        }
        .fa-battery-0:before,
        .fa-battery-empty:before {
            content: "\f244";
        }
        .fa-mouse-pointer:before {
            content: "\f245";
        }
        .fa-i-cursor:before {
            content: "\f246";
        }
        .fa-object-group:before {
            content: "\f247";
        }
        .fa-object-ungroup:before {
            content: "\f248";
        }
        .fa-sticky-note:before {
            content: "\f249";
        }
        .fa-sticky-note-o:before {
            content: "\f24a";
        }
        .fa-cc-jcb:before {
            content: "\f24b";
        }
        .fa-cc-diners-club:before {
            content: "\f24c";
        }
        .fa-clone:before {
            content: "\f24d";
        }
        .fa-balance-scale:before {
            content: "\f24e";
        }
        .fa-hourglass-o:before {
            content: "\f250";
        }
        .fa-hourglass-1:before,
        .fa-hourglass-start:before {
            content: "\f251";
        }
        .fa-hourglass-2:before,
        .fa-hourglass-half:before {
            content: "\f252";
        }
        .fa-hourglass-3:before,
        .fa-hourglass-end:before {
            content: "\f253";
        }
        .fa-hourglass:before {
            content: "\f254";
        }
        .fa-hand-grab-o:before,
        .fa-hand-rock-o:before {
            content: "\f255";
        }
        .fa-hand-stop-o:before,
        .fa-hand-paper-o:before {
            content: "\f256";
        }
        .fa-hand-scissors-o:before {
            content: "\f257";
        }
        .fa-hand-lizard-o:before {
            content: "\f258";
        }
        .fa-hand-spock-o:before {
            content: "\f259";
        }
        .fa-hand-pointer-o:before {
            content: "\f25a";
        }
        .fa-hand-peace-o:before {
            content: "\f25b";
        }
        .fa-trademark:before {
            content: "\f25c";
        }
        .fa-registered:before {
            content: "\f25d";
        }
        .fa-creative-commons:before {
            content: "\f25e";
        }
        .fa-gg:before {
            content: "\f260";
        }
        .fa-gg-circle:before {
            content: "\f261";
        }
        .fa-tripadvisor:before {
            content: "\f262";
        }
        .fa-odnoklassniki:before {
            content: "\f263";
        }
        .fa-odnoklassniki-square:before {
            content: "\f264";
        }
        .fa-get-pocket:before {
            content: "\f265";
        }
        .fa-wikipedia-w:before {
            content: "\f266";
        }
        .fa-safari:before {
            content: "\f267";
        }
        .fa-chrome:before {
            content: "\f268";
        }
        .fa-firefox:before {
            content: "\f269";
        }
        .fa-opera:before {
            content: "\f26a";
        }
        .fa-internet-explorer:before {
            content: "\f26b";
        }
        .fa-tv:before,
        .fa-television:before {
            content: "\f26c";
        }
        .fa-contao:before {
            content: "\f26d";
        }
        .fa-500px:before {
            content: "\f26e";
        }
        .fa-amazon:before {
            content: "\f270";
        }
        .fa-calendar-plus-o:before {
            content: "\f271";
        }
        .fa-calendar-minus-o:before {
            content: "\f272";
        }
        .fa-calendar-times-o:before {
            content: "\f273";
        }
        .fa-calendar-check-o:before {
            content: "\f274";
        }
        .fa-industry:before {
            content: "\f275";
        }
        .fa-map-pin:before {
            content: "\f276";
        }
        .fa-map-signs:before {
            content: "\f277";
        }
        .fa-map-o:before {
            content: "\f278";
        }
        .fa-map:before {
            content: "\f279";
        }
        .fa-commenting:before {
            content: "\f27a";
        }
        .fa-commenting-o:before {
            content: "\f27b";
        }
        .fa-houzz:before {
            content: "\f27c";
        }
        .fa-vimeo:before {
            content: "\f27d";
        }
        .fa-black-tie:before {
            content: "\f27e";
        }
        .fa-fonticons:before {
            content: "\f280";
        }
        .fa-reddit-alien:before {
            content: "\f281";
        }
        .fa-edge:before {
            content: "\f282";
        }
        .fa-credit-card-alt:before {
            content: "\f283";
        }
        .fa-codiepie:before {
            content: "\f284";
        }
        .fa-modx:before {
            content: "\f285";
        }
        .fa-fort-awesome:before {
            content: "\f286";
        }
        .fa-usb:before {
            content: "\f287";
        }
        .fa-product-hunt:before {
            content: "\f288";
        }
        .fa-mixcloud:before {
            content: "\f289";
        }
        .fa-scribd:before {
            content: "\f28a";
        }
        .fa-pause-circle:before {
            content: "\f28b";
        }
        .fa-pause-circle-o:before {
            content: "\f28c";
        }
        .fa-stop-circle:before {
            content: "\f28d";
        }
        .fa-stop-circle-o:before {
            content: "\f28e";
        }
        .fa-shopping-bag:before {
            content: "\f290";
        }
        .fa-shopping-basket:before {
            content: "\f291";
        }
        .fa-hashtag:before {
            content: "\f292";
        }
        .fa-bluetooth:before {
            content: "\f293";
        }
        .fa-bluetooth-b:before {
            content: "\f294";
        }
        .fa-percent:before {
            content: "\f295";
        }

        body.stop-scrolling {
            height: 100%;
            overflow: hidden; }

        .sweet-overlay {
            background-color: black;
            /* IE8 */
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
            /* IE8 */
            background-color: rgba(0, 0, 0, 0.4);
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            display: none;
            z-index: 10000; }

        .sweet-alert {
            background-color: white;
            font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            width: 478px;
            padding: 17px;
            border-radius: 5px;
            text-align: center;
            position: fixed;
            left: 50%;
            top: 50%;
            margin-left: -256px;
            margin-top: -200px;
            overflow: hidden;
            display: none;
            z-index: 99999; }
        @media all and (max-width: 540px) {
            .sweet-alert {
                width: auto;
                margin-left: 0;
                margin-right: 0;
                left: 15px;
                right: 15px; } }
        .sweet-alert h2 {
            color: #575757;
            font-size: 30px;
            text-align: center;
            font-weight: 600;
            text-transform: none;
            position: relative;
            margin: 25px 0;
            padding: 0;
            line-height: 40px;
            display: block; }
        .sweet-alert p {
            color: #797979;
            font-size: 16px;
            text-align: center;
            font-weight: 300;
            position: relative;
            text-align: inherit;
            float: none;
            margin: 0;
            padding: 0;
            line-height: normal; }
        .sweet-alert fieldset {
            border: none;
            position: relative; }
        .sweet-alert .sa-error-container {
            background-color: #f1f1f1;
            margin-left: -17px;
            margin-right: -17px;
            overflow: hidden;
            padding: 0 10px;
            max-height: 0;
            webkit-transition: padding 0.15s, max-height 0.15s;
            transition: padding 0.15s, max-height 0.15s; }
        .sweet-alert .sa-error-container.show {
            padding: 10px 0;
            max-height: 100px;
            webkit-transition: padding 0.2s, max-height 0.2s;
            transition: padding 0.25s, max-height 0.25s; }
        .sweet-alert .sa-error-container .icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: #ea7d7d;
            color: white;
            line-height: 24px;
            text-align: center;
            margin-right: 3px; }
        .sweet-alert .sa-error-container p {
            display: inline-block; }
        .sweet-alert .sa-input-error {
            position: absolute;
            top: 29px;
            right: 26px;
            width: 20px;
            height: 20px;
            opacity: 0;
            -webkit-transform: scale(0.5);
            transform: scale(0.5);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            -webkit-transition: all 0.1s;
            transition: all 0.1s; }
        .sweet-alert .sa-input-error::before, .sweet-alert .sa-input-error::after {
            content: "";
            width: 20px;
            height: 6px;
            background-color: #f06e57;
            border-radius: 3px;
            position: absolute;
            top: 50%;
            margin-top: -4px;
            left: 50%;
            margin-left: -9px; }
        .sweet-alert .sa-input-error::before {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg); }
        .sweet-alert .sa-input-error::after {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg); }
        .sweet-alert .sa-input-error.show {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1); }
        .sweet-alert input {
            width: 100%;
            box-sizing: border-box;
            border-radius: 3px;
            border: 1px solid #d7d7d7;
            height: 43px;
            margin-top: 10px;
            margin-bottom: 17px;
            font-size: 18px;
            box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.06);
            padding: 0 12px;
            display: none;
            -webkit-transition: all 0.3s;
            transition: all 0.3s; }
        .sweet-alert input:focus {
            outline: none;
            box-shadow: 0px 0px 3px #c4e6f5;
            border: 1px solid #b4dbed; }
        .sweet-alert input:focus::-moz-placeholder {
            transition: opacity 0.3s 0.03s ease;
            opacity: 0.5; }
        .sweet-alert input:focus:-ms-input-placeholder {
            transition: opacity 0.3s 0.03s ease;
            opacity: 0.5; }
        .sweet-alert input:focus::-webkit-input-placeholder {
            transition: opacity 0.3s 0.03s ease;
            opacity: 0.5; }
        .sweet-alert input::-moz-placeholder {
            color: #bdbdbd; }
        .sweet-alert input:-ms-input-placeholder {
            color: #bdbdbd; }
        .sweet-alert input::-webkit-input-placeholder {
            color: #bdbdbd; }
        .sweet-alert.show-input input {
            display: block; }
        .sweet-alert .sa-confirm-button-container {
            display: inline-block;
            position: relative; }
        .sweet-alert .la-ball-fall {
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -27px;
            margin-top: 4px;
            opacity: 0;
            visibility: hidden; }
        .sweet-alert button {
            background-color: #8CD4F5;
            color: white;
            border: none;
            box-shadow: none;
            font-size: 17px;
            font-weight: 500;
            -webkit-border-radius: 4px;
            border-radius: 5px;
            padding: 10px 32px;
            margin: 26px 5px 0 5px;
            cursor: pointer; }
        .sweet-alert button:focus {
            outline: none;
            box-shadow: 0 0 2px rgba(128, 179, 235, 0.5), inset 0 0 0 1px rgba(0, 0, 0, 0.05); }
        .sweet-alert button:hover {
            background-color: #7ecff4; }
        .sweet-alert button:active {
            background-color: #5dc2f1; }
        .sweet-alert button.cancel {
            background-color: #C1C1C1; }
        .sweet-alert button.cancel:hover {
            background-color: #b9b9b9; }
        .sweet-alert button.cancel:active {
            background-color: #a8a8a8; }
        .sweet-alert button.cancel:focus {
            box-shadow: rgba(197, 205, 211, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.0470588) 0px 0px 0px 1px inset !important; }
        .sweet-alert button[disabled] {
            opacity: .6;
            cursor: default; }
        .sweet-alert button.confirm[disabled] {
            color: transparent; }
        .sweet-alert button.confirm[disabled] ~ .la-ball-fall {
            opacity: 1;
            visibility: visible;
            transition-delay: 0s; }
        .sweet-alert button::-moz-focus-inner {
            border: 0; }
        .sweet-alert[data-has-cancel-button=false] button {
            box-shadow: none !important; }
        .sweet-alert[data-has-confirm-button=false][data-has-cancel-button=false] {
            padding-bottom: 40px; }
        .sweet-alert .sa-icon {
            width: 80px;
            height: 80px;
            border: 4px solid gray;
            -webkit-border-radius: 40px;
            border-radius: 40px;
            border-radius: 50%;
            margin: 20px auto;
            padding: 0;
            position: relative;
            box-sizing: content-box; }
        .sweet-alert .sa-icon.sa-error {
            border-color: #F27474; }
        .sweet-alert .sa-icon.sa-error .sa-x-mark {
            position: relative;
            display: block; }
        .sweet-alert .sa-icon.sa-error .sa-line {
            position: absolute;
            height: 5px;
            width: 47px;
            background-color: #F27474;
            display: block;
            top: 37px;
            border-radius: 2px; }
        .sweet-alert .sa-icon.sa-error .sa-line.sa-left {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            left: 17px; }
        .sweet-alert .sa-icon.sa-error .sa-line.sa-right {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            right: 16px; }
        .sweet-alert .sa-icon.sa-warning {
            border-color: #F8BB86; }
        .sweet-alert .sa-icon.sa-warning .sa-body {
            position: absolute;
            width: 5px;
            height: 47px;
            left: 50%;
            top: 10px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            margin-left: -2px;
            background-color: #F8BB86; }
        .sweet-alert .sa-icon.sa-warning .sa-dot {
            position: absolute;
            width: 7px;
            height: 7px;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            margin-left: -3px;
            left: 50%;
            bottom: 10px;
            background-color: #F8BB86; }
        .sweet-alert .sa-icon.sa-info {
            border-color: #C9DAE1; }
        .sweet-alert .sa-icon.sa-info::before {
            content: "";
            position: absolute;
            width: 5px;
            height: 29px;
            left: 50%;
            bottom: 17px;
            border-radius: 2px;
            margin-left: -2px;
            background-color: #C9DAE1; }
        .sweet-alert .sa-icon.sa-info::after {
            content: "";
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            margin-left: -3px;
            top: 19px;
            background-color: #C9DAE1; }
        .sweet-alert .sa-icon.sa-success {
            border-color: #A5DC86; }
        .sweet-alert .sa-icon.sa-success::before, .sweet-alert .sa-icon.sa-success::after {
            content: '';
            -webkit-border-radius: 40px;
            border-radius: 40px;
            border-radius: 50%;
            position: absolute;
            width: 60px;
            height: 120px;
            background: white;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg); }
        .sweet-alert .sa-icon.sa-success::before {
            -webkit-border-radius: 120px 0 0 120px;
            border-radius: 120px 0 0 120px;
            top: -7px;
            left: -33px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 60px 60px;
            transform-origin: 60px 60px; }
        .sweet-alert .sa-icon.sa-success::after {
            -webkit-border-radius: 0 120px 120px 0;
            border-radius: 0 120px 120px 0;
            top: -11px;
            left: 30px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 0px 60px;
            transform-origin: 0px 60px; }
        .sweet-alert .sa-icon.sa-success .sa-placeholder {
            width: 80px;
            height: 80px;
            border: 4px solid rgba(165, 220, 134, 0.2);
            -webkit-border-radius: 40px;
            border-radius: 40px;
            border-radius: 50%;
            box-sizing: content-box;
            position: absolute;
            left: -4px;
            top: -4px;
            z-index: 2; }
        .sweet-alert .sa-icon.sa-success .sa-fix {
            width: 5px;
            height: 90px;
            background-color: white;
            position: absolute;
            left: 28px;
            top: 8px;
            z-index: 1;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg); }
        .sweet-alert .sa-icon.sa-success .sa-line {
            height: 5px;
            background-color: #A5DC86;
            display: block;
            border-radius: 2px;
            position: absolute;
            z-index: 2; }
        .sweet-alert .sa-icon.sa-success .sa-line.sa-tip {
            width: 25px;
            left: 14px;
            top: 46px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg); }
        .sweet-alert .sa-icon.sa-success .sa-line.sa-long {
            width: 47px;
            right: 8px;
            top: 38px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg); }
        .sweet-alert .sa-icon.sa-custom {
            background-size: contain;
            border-radius: 0;
            border: none;
            background-position: center center;
            background-repeat: no-repeat; }

        /*
 * Animations
 */
        @-webkit-keyframes showSweetAlert {
            0% {
                transform: scale(0.7);
                -webkit-transform: scale(0.7); }
            45% {
                transform: scale(1.05);
                -webkit-transform: scale(1.05); }
            80% {
                transform: scale(0.95);
                -webkit-transform: scale(0.95); }
            100% {
                transform: scale(1);
                -webkit-transform: scale(1); } }

        @keyframes showSweetAlert {
            0% {
                transform: scale(0.7);
                -webkit-transform: scale(0.7); }
            45% {
                transform: scale(1.05);
                -webkit-transform: scale(1.05); }
            80% {
                transform: scale(0.95);
                -webkit-transform: scale(0.95); }
            100% {
                transform: scale(1);
                -webkit-transform: scale(1); } }

        @-webkit-keyframes hideSweetAlert {
            0% {
                transform: scale(1);
                -webkit-transform: scale(1); }
            100% {
                transform: scale(0.5);
                -webkit-transform: scale(0.5); } }

        @keyframes hideSweetAlert {
            0% {
                transform: scale(1);
                -webkit-transform: scale(1); }
            100% {
                transform: scale(0.5);
                -webkit-transform: scale(0.5); } }

        @-webkit-keyframes slideFromTop {
            0% {
                top: 0%; }
            100% {
                top: 50%; } }

        @keyframes slideFromTop {
            0% {
                top: 0%; }
            100% {
                top: 50%; } }

        @-webkit-keyframes slideToTop {
            0% {
                top: 50%; }
            100% {
                top: 0%; } }

        @keyframes slideToTop {
            0% {
                top: 50%; }
            100% {
                top: 0%; } }

        @-webkit-keyframes slideFromBottom {
            0% {
                top: 70%; }
            100% {
                top: 50%; } }

        @keyframes slideFromBottom {
            0% {
                top: 70%; }
            100% {
                top: 50%; } }

        @-webkit-keyframes slideToBottom {
            0% {
                top: 50%; }
            100% {
                top: 70%; } }

        @keyframes slideToBottom {
            0% {
                top: 50%; }
            100% {
                top: 70%; } }

        .showSweetAlert[data-animation=pop] {
            -webkit-animation: showSweetAlert 0.3s;
            animation: showSweetAlert 0.3s; }

        .showSweetAlert[data-animation=none] {
            -webkit-animation: none;
            animation: none; }

        .showSweetAlert[data-animation=slide-from-top] {
            -webkit-animation: slideFromTop 0.3s;
            animation: slideFromTop 0.3s; }

        .showSweetAlert[data-animation=slide-from-bottom] {
            -webkit-animation: slideFromBottom 0.3s;
            animation: slideFromBottom 0.3s; }

        .hideSweetAlert[data-animation=pop] {
            -webkit-animation: hideSweetAlert 0.2s;
            animation: hideSweetAlert 0.2s; }

        .hideSweetAlert[data-animation=none] {
            -webkit-animation: none;
            animation: none; }

        .hideSweetAlert[data-animation=slide-from-top] {
            -webkit-animation: slideToTop 0.4s;
            animation: slideToTop 0.4s; }

        .hideSweetAlert[data-animation=slide-from-bottom] {
            -webkit-animation: slideToBottom 0.3s;
            animation: slideToBottom 0.3s; }

        @-webkit-keyframes animateSuccessTip {
            0% {
                width: 0;
                left: 1px;
                top: 19px; }
            54% {
                width: 0;
                left: 1px;
                top: 19px; }
            70% {
                width: 50px;
                left: -8px;
                top: 37px; }
            84% {
                width: 17px;
                left: 21px;
                top: 48px; }
            100% {
                width: 25px;
                left: 14px;
                top: 45px; } }

        @keyframes animateSuccessTip {
            0% {
                width: 0;
                left: 1px;
                top: 19px; }
            54% {
                width: 0;
                left: 1px;
                top: 19px; }
            70% {
                width: 50px;
                left: -8px;
                top: 37px; }
            84% {
                width: 17px;
                left: 21px;
                top: 48px; }
            100% {
                width: 25px;
                left: 14px;
                top: 45px; } }

        @-webkit-keyframes animateSuccessLong {
            0% {
                width: 0;
                right: 46px;
                top: 54px; }
            65% {
                width: 0;
                right: 46px;
                top: 54px; }
            84% {
                width: 55px;
                right: 0px;
                top: 35px; }
            100% {
                width: 47px;
                right: 8px;
                top: 38px; } }

        @keyframes animateSuccessLong {
            0% {
                width: 0;
                right: 46px;
                top: 54px; }
            65% {
                width: 0;
                right: 46px;
                top: 54px; }
            84% {
                width: 55px;
                right: 0px;
                top: 35px; }
            100% {
                width: 47px;
                right: 8px;
                top: 38px; } }

        @-webkit-keyframes rotatePlaceholder {
            0% {
                transform: rotate(-45deg);
                -webkit-transform: rotate(-45deg); }
            5% {
                transform: rotate(-45deg);
                -webkit-transform: rotate(-45deg); }
            12% {
                transform: rotate(-405deg);
                -webkit-transform: rotate(-405deg); }
            100% {
                transform: rotate(-405deg);
                -webkit-transform: rotate(-405deg); } }

        @keyframes rotatePlaceholder {
            0% {
                transform: rotate(-45deg);
                -webkit-transform: rotate(-45deg); }
            5% {
                transform: rotate(-45deg);
                -webkit-transform: rotate(-45deg); }
            12% {
                transform: rotate(-405deg);
                -webkit-transform: rotate(-405deg); }
            100% {
                transform: rotate(-405deg);
                -webkit-transform: rotate(-405deg); } }

        .animateSuccessTip {
            -webkit-animation: animateSuccessTip 0.75s;
            animation: animateSuccessTip 0.75s; }

        .animateSuccessLong {
            -webkit-animation: animateSuccessLong 0.75s;
            animation: animateSuccessLong 0.75s; }

        .sa-icon.sa-success.animate::after {
            -webkit-animation: rotatePlaceholder 4.25s ease-in;
            animation: rotatePlaceholder 4.25s ease-in; }

        @-webkit-keyframes animateErrorIcon {
            0% {
                transform: rotateX(100deg);
                -webkit-transform: rotateX(100deg);
                opacity: 0; }
            100% {
                transform: rotateX(0deg);
                -webkit-transform: rotateX(0deg);
                opacity: 1; } }

        @keyframes animateErrorIcon {
            0% {
                transform: rotateX(100deg);
                -webkit-transform: rotateX(100deg);
                opacity: 0; }
            100% {
                transform: rotateX(0deg);
                -webkit-transform: rotateX(0deg);
                opacity: 1; } }

        .animateErrorIcon {
            -webkit-animation: animateErrorIcon 0.5s;
            animation: animateErrorIcon 0.5s; }

        @-webkit-keyframes animateXMark {
            0% {
                transform: scale(0.4);
                -webkit-transform: scale(0.4);
                margin-top: 26px;
                opacity: 0; }
            50% {
                transform: scale(0.4);
                -webkit-transform: scale(0.4);
                margin-top: 26px;
                opacity: 0; }
            80% {
                transform: scale(1.15);
                -webkit-transform: scale(1.15);
                margin-top: -6px; }
            100% {
                transform: scale(1);
                -webkit-transform: scale(1);
                margin-top: 0;
                opacity: 1; } }

        @keyframes animateXMark {
            0% {
                transform: scale(0.4);
                -webkit-transform: scale(0.4);
                margin-top: 26px;
                opacity: 0; }
            50% {
                transform: scale(0.4);
                -webkit-transform: scale(0.4);
                margin-top: 26px;
                opacity: 0; }
            80% {
                transform: scale(1.15);
                -webkit-transform: scale(1.15);
                margin-top: -6px; }
            100% {
                transform: scale(1);
                -webkit-transform: scale(1);
                margin-top: 0;
                opacity: 1; } }

        .animateXMark {
            -webkit-animation: animateXMark 0.5s;
            animation: animateXMark 0.5s; }

        @-webkit-keyframes pulseWarning {
            0% {
                border-color: #F8D486; }
            100% {
                border-color: #F8BB86; } }

        @keyframes pulseWarning {
            0% {
                border-color: #F8D486; }
            100% {
                border-color: #F8BB86; } }

        .pulseWarning {
            -webkit-animation: pulseWarning 0.75s infinite alternate;
            animation: pulseWarning 0.75s infinite alternate; }

        @-webkit-keyframes pulseWarningIns {
            0% {
                background-color: #F8D486; }
            100% {
                background-color: #F8BB86; } }

        @keyframes pulseWarningIns {
            0% {
                background-color: #F8D486; }
            100% {
                background-color: #F8BB86; } }

        .pulseWarningIns {
            -webkit-animation: pulseWarningIns 0.75s infinite alternate;
            animation: pulseWarningIns 0.75s infinite alternate; }

        @-webkit-keyframes rotate-loading {
            0% {
                transform: rotate(0deg); }
            100% {
                transform: rotate(360deg); } }

        @keyframes rotate-loading {
            0% {
                transform: rotate(0deg); }
            100% {
                transform: rotate(360deg); } }

        /* Internet Explorer 9 has some special quirks that are fixed here */
        /* The icons are not animated. */
        /* This file is automatically merged into sweet-alert.min.js through Gulp */
        /* Error icon */
        .sweet-alert .sa-icon.sa-error .sa-line.sa-left {
            -ms-transform: rotate(45deg) \9; }

        .sweet-alert .sa-icon.sa-error .sa-line.sa-right {
            -ms-transform: rotate(-45deg) \9; }

        /* Success icon */
        .sweet-alert .sa-icon.sa-success {
            border-color: transparent\9; }

        .sweet-alert .sa-icon.sa-success .sa-line.sa-tip {
            -ms-transform: rotate(45deg) \9; }

        .sweet-alert .sa-icon.sa-success .sa-line.sa-long {
            -ms-transform: rotate(-45deg) \9; }

        /*!
 * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
 * Copyright 2015 Daniel Cardoso <@DanielCardoso>
 * Licensed under MIT
 */
        .la-ball-fall,
        .la-ball-fall > div {
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box; }

        .la-ball-fall {
            display: block;
            font-size: 0;
            color: #fff; }

        .la-ball-fall.la-dark {
            color: #333; }

        .la-ball-fall > div {
            display: inline-block;
            float: none;
            background-color: currentColor;
            border: 0 solid currentColor; }

        .la-ball-fall {
            width: 54px;
            height: 18px; }

        .la-ball-fall > div {
            width: 10px;
            height: 10px;
            margin: 4px;
            border-radius: 100%;
            opacity: 0;
            -webkit-animation: ball-fall 1s ease-in-out infinite;
            -moz-animation: ball-fall 1s ease-in-out infinite;
            -o-animation: ball-fall 1s ease-in-out infinite;
            animation: ball-fall 1s ease-in-out infinite; }

        .la-ball-fall > div:nth-child(1) {
            -webkit-animation-delay: -200ms;
            -moz-animation-delay: -200ms;
            -o-animation-delay: -200ms;
            animation-delay: -200ms; }

        .la-ball-fall > div:nth-child(2) {
            -webkit-animation-delay: -100ms;
            -moz-animation-delay: -100ms;
            -o-animation-delay: -100ms;
            animation-delay: -100ms; }

        .la-ball-fall > div:nth-child(3) {
            -webkit-animation-delay: 0ms;
            -moz-animation-delay: 0ms;
            -o-animation-delay: 0ms;
            animation-delay: 0ms; }

        .la-ball-fall.la-sm {
            width: 26px;
            height: 8px; }

        .la-ball-fall.la-sm > div {
            width: 4px;
            height: 4px;
            margin: 2px; }

        .la-ball-fall.la-2x {
            width: 108px;
            height: 36px; }

        .la-ball-fall.la-2x > div {
            width: 20px;
            height: 20px;
            margin: 8px; }

        .la-ball-fall.la-3x {
            width: 162px;
            height: 54px; }

        .la-ball-fall.la-3x > div {
            width: 30px;
            height: 30px;
            margin: 12px; }

        /*
 * Animation
 */
        @-webkit-keyframes ball-fall {
            0% {
                opacity: 0;
                -webkit-transform: translateY(-145%);
                transform: translateY(-145%); }
            10% {
                opacity: .5; }
            20% {
                opacity: 1;
                -webkit-transform: translateY(0);
                transform: translateY(0); }
            80% {
                opacity: 1;
                -webkit-transform: translateY(0);
                transform: translateY(0); }
            90% {
                opacity: .5; }
            100% {
                opacity: 0;
                -webkit-transform: translateY(145%);
                transform: translateY(145%); } }

        @-moz-keyframes ball-fall {
            0% {
                opacity: 0;
                -moz-transform: translateY(-145%);
                transform: translateY(-145%); }
            10% {
                opacity: .5; }
            20% {
                opacity: 1;
                -moz-transform: translateY(0);
                transform: translateY(0); }
            80% {
                opacity: 1;
                -moz-transform: translateY(0);
                transform: translateY(0); }
            90% {
                opacity: .5; }
            100% {
                opacity: 0;
                -moz-transform: translateY(145%);
                transform: translateY(145%); } }

        @-o-keyframes ball-fall {
            0% {
                opacity: 0;
                -o-transform: translateY(-145%);
                transform: translateY(-145%); }
            10% {
                opacity: .5; }
            20% {
                opacity: 1;
                -o-transform: translateY(0);
                transform: translateY(0); }
            80% {
                opacity: 1;
                -o-transform: translateY(0);
                transform: translateY(0); }
            90% {
                opacity: .5; }
            100% {
                opacity: 0;
                -o-transform: translateY(145%);
                transform: translateY(145%); } }

        @keyframes ball-fall {
            0% {
                opacity: 0;
                -webkit-transform: translateY(-145%);
                -moz-transform: translateY(-145%);
                -o-transform: translateY(-145%);
                transform: translateY(-145%); }
            10% {
                opacity: .5; }
            20% {
                opacity: 1;
                -webkit-transform: translateY(0);
                -moz-transform: translateY(0);
                -o-transform: translateY(0);
                transform: translateY(0); }
            80% {
                opacity: 1;
                -webkit-transform: translateY(0);
                -moz-transform: translateY(0);
                -o-transform: translateY(0);
                transform: translateY(0); }
            90% {
                opacity: .5; }
            100% {
                opacity: 0;
                -webkit-transform: translateY(145%);
                -moz-transform: translateY(145%);
                -o-transform: translateY(145%);
                transform: translateY(145%); } }


        .fa-times{
            color: red;
        }
        .fa-times:hover{
            color: darkred;
        }
        .fa-pencil{
            color: limegreen;
        }
        .fa-pencil:hover{
            color: green;
        }
        .fa-briefcase{
            color:limegreen;
        }
        .fa-briefcase:hover{
            color: green;
        }
        .header-main{
            border-bottom: 1px solid gray;
            padding: 0.5em 0 0.5em 1em;
        }

        .header-right{
            padding-top: 0.5em;
        }
        i.glyphicon{
            color:white;
        }

        i.glyphicon:hover{
            color:orange;
        }

        .texto{
            font-size: 1em;
        }

        #pagination{
            margin-left: auto;
            margin-right: auto;
        }

        #pagination ul{
            margin: 0 20% 0 40%;
        }

        /*--------------------------------*/
        body{
            font-size: 14px;
        }
        .page-container{
            position: absolute;
            bottom: 0;
        }
        .sidebar-menu {
            min-height: 100%;
            height:100vh;
        }
        .copyrights{
            border-top: 1px solid gray;
            margin-top: auto;
            font-size: 15px;
            padding: 1px 1px;
        }

        .copyrights div{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }

        .copyrights p{
            color: black;
        }

        .copyrights div img{
            width: 3em;
            height: 3em;
            margin: 1em;
        }

        .login_link{
            margin: 0.5em;
            padding: 0.5em;
        }
        .login_link a{
            color: #1f648b;
        }
        .logo-name {
            float: left;
            margin: 0.5em;
            padding: 0.5em;
        }
        .mother-grid-inner{
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .profile_details_left{
            width: 20%;
        }
        .header-right{
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }
        .page-container{
            display: flex;
            justify-content: flex-end;
        }

        .inner-block{
            padding: 2em;
            height: 100%;
            overflow-y: scroll;
        }
        .logo-name{
            margin: 0em;
            padding: 0em;
        }

        .form-control{
            height: 39px;
        }

        /*para que las acciones se vean al centro*/
        ul.list-inline{
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        #equipmet-text{
            padding-bottom: 0.5em;
        }

        .esk{
            margin-top: 1em;
        }

        .instruction-div{
            display: flex;
        }

        .instruction-lable{
            display: flex;
            justify-content: center;
            flex-direction: column;
            margin: 0.5em;
        }

        .instruction-input{
            margin-right: 0.5em;
        }

        .instruction-button {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .select2-container {
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle; }
        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 28px;
            user-select: none;
            -webkit-user-select: none; }
        .select2-container .select2-selection--single .select2-selection__rendered {
            display: block;
            padding-left: 8px;
            padding-right: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap; }
        .select2-container .select2-selection--single .select2-selection__clear {
            position: relative; }
        .select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered {
            padding-right: 8px;
            padding-left: 20px; }
        .select2-container .select2-selection--multiple {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            min-height: 32px;
            user-select: none;
            -webkit-user-select: none; }
        .select2-container .select2-selection--multiple .select2-selection__rendered {
            display: inline-block;
            overflow: hidden;
            padding-left: 8px;
            text-overflow: ellipsis;
            white-space: nowrap; }
        .select2-container .select2-search--inline {
            float: left; }
        .select2-container .select2-search--inline .select2-search__field {
            box-sizing: border-box;
            border: none;
            font-size: 100%;
            margin-top: 5px;
            padding: 0; }
        .select2-container .select2-search--inline .select2-search__field::-webkit-search-cancel-button {
            -webkit-appearance: none; }

        .select2-dropdown {
            background-color: white;
            border: 1px solid #aaa;
            border-radius: 4px;
            box-sizing: border-box;
            display: block;
            position: absolute;
            left: -100000px;
            width: 100%;
            z-index: 1051; }

        .select2-results {
            display: block; }

        .select2-results__options {
            list-style: none;
            margin: 0;
            padding: 0; }

        .select2-results__option {
            padding: 6px;
            user-select: none;
            -webkit-user-select: none; }
        .select2-results__option[aria-selected] {
            cursor: pointer; }

        .select2-container--open .select2-dropdown {
            left: 0; }

        .select2-container--open .select2-dropdown--above {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0; }

        .select2-container--open .select2-dropdown--below {
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0; }

        .select2-search--dropdown {
            display: block;
            padding: 4px; }
        .select2-search--dropdown .select2-search__field {
            padding: 4px;
            width: 100%;
            box-sizing: border-box; }
        .select2-search--dropdown .select2-search__field::-webkit-search-cancel-button {
            -webkit-appearance: none; }
        .select2-search--dropdown.select2-search--hide {
            display: none; }

        .select2-close-mask {
            border: 0;
            margin: 0;
            padding: 0;
            display: block;
            position: fixed;
            left: 0;
            top: 0;
            min-height: 100%;
            min-width: 100%;
            height: auto;
            width: auto;
            opacity: 0;
            z-index: 99;
            background-color: #fff;
            filter: alpha(opacity=0); }

        .select2-hidden-accessible {
            border: 0 !important;
            clip: rect(0 0 0 0) !important;
            height: 1px !important;
            margin: -1px !important;
            overflow: hidden !important;
            padding: 0 !important;
            position: absolute !important;
            width: 1px !important; }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px; }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px; }
        .select2-container--default .select2-selection--single .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold; }
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #999; }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px; }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #888 transparent transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0 4px;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute;
            top: 50%;
            width: 0; }

        .select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__clear {
            float: left; }

        .select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__arrow {
            left: 1px;
            right: auto; }

        .select2-container--default.select2-container--disabled .select2-selection--single {
            background-color: #eee;
            cursor: default; }
        .select2-container--default.select2-container--disabled .select2-selection--single .select2-selection__clear {
            display: none; }

        .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #888 transparent;
            border-width: 0 4px 5px 4px; }

        .select2-container--default .select2-selection--multiple {
            background-color: white;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: text; }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            box-sizing: border-box;
            list-style: none;
            margin: 0;
            padding: 0 5px;
            width: 100%; }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            list-style: none; }
        .select2-container--default .select2-selection--multiple .select2-selection__placeholder {
            color: #999;
            margin-top: 5px;
            float: left; }
        .select2-container--default .select2-selection--multiple .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold;
            margin-top: 5px;
            margin-right: 10px; }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #e4e4e4;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0 5px; }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #999;
            cursor: pointer;
            display: inline-block;
            font-weight: bold;
            margin-right: 2px; }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #333; }

        .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice, .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__placeholder, .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-search--inline {
            float: right; }

        .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice {
            margin-left: 5px;
            margin-right: auto; }

        .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove {
            margin-left: 2px;
            margin-right: auto; }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: solid black 1px;
            outline: 0; }

        .select2-container--default.select2-container--disabled .select2-selection--multiple {
            background-color: #eee;
            cursor: default; }

        .select2-container--default.select2-container--disabled .select2-selection__choice__remove {
            display: none; }

        .select2-container--default.select2-container--open.select2-container--above .select2-selection--single, .select2-container--default.select2-container--open.select2-container--above .select2-selection--multiple {
            border-top-left-radius: 0;
            border-top-right-radius: 0; }

        .select2-container--default.select2-container--open.select2-container--below .select2-selection--single, .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0; }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid #aaa; }

        .select2-container--default .select2-search--inline .select2-search__field {
            background: transparent;
            border: none;
            outline: 0;
            box-shadow: none;
            -webkit-appearance: textfield; }

        .select2-container--default .select2-results > .select2-results__options {
            max-height: 200px;
            overflow-y: auto; }

        .select2-container--default .select2-results__option[role=group] {
            padding: 0; }

        .select2-container--default .select2-results__option[aria-disabled=true] {
            color: #999; }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #ddd; }

        .select2-container--default .select2-results__option .select2-results__option {
            padding-left: 1em; }
        .select2-container--default .select2-results__option .select2-results__option .select2-results__group {
            padding-left: 0; }
        .select2-container--default .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -1em;
            padding-left: 2em; }
        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -2em;
            padding-left: 3em; }
        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -3em;
            padding-left: 4em; }
        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -4em;
            padding-left: 5em; }
        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -5em;
            padding-left: 6em; }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #5897fb;
            color: white; }

        .select2-container--default .select2-results__group {
            cursor: default;
            display: block;
            padding: 6px; }

        .select2-container--classic .select2-selection--single {
            background-color: #f7f7f7;
            border: 1px solid #aaa;
            border-radius: 4px;
            outline: 0;
            background-image: -webkit-linear-gradient(top, white 50%, #eeeeee 100%);
            background-image: -o-linear-gradient(top, white 50%, #eeeeee 100%);
            background-image: linear-gradient(to bottom, white 50%, #eeeeee 100%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0); }
        .select2-container--classic .select2-selection--single:focus {
            border: 1px solid #5897fb; }
        .select2-container--classic .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px; }
        .select2-container--classic .select2-selection--single .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold;
            margin-right: 10px; }
        .select2-container--classic .select2-selection--single .select2-selection__placeholder {
            color: #999; }
        .select2-container--classic .select2-selection--single .select2-selection__arrow {
            background-color: #ddd;
            border: none;
            border-left: 1px solid #aaa;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            height: 26px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
            background-image: -webkit-linear-gradient(top, #eeeeee 50%, #cccccc 100%);
            background-image: -o-linear-gradient(top, #eeeeee 50%, #cccccc 100%);
            background-image: linear-gradient(to bottom, #eeeeee 50%, #cccccc 100%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFEEEEEE', endColorstr='#FFCCCCCC', GradientType=0); }
        .select2-container--classic .select2-selection--single .select2-selection__arrow b {
            border-color: #888 transparent transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0 4px;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute;
            top: 50%;
            width: 0; }

        .select2-container--classic[dir="rtl"] .select2-selection--single .select2-selection__clear {
            float: left; }

        .select2-container--classic[dir="rtl"] .select2-selection--single .select2-selection__arrow {
            border: none;
            border-right: 1px solid #aaa;
            border-radius: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            left: 1px;
            right: auto; }

        .select2-container--classic.select2-container--open .select2-selection--single {
            border: 1px solid #5897fb; }
        .select2-container--classic.select2-container--open .select2-selection--single .select2-selection__arrow {
            background: transparent;
            border: none; }
        .select2-container--classic.select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #888 transparent;
            border-width: 0 4px 5px 4px; }

        .select2-container--classic.select2-container--open.select2-container--above .select2-selection--single {
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            background-image: -webkit-linear-gradient(top, white 0%, #eeeeee 50%);
            background-image: -o-linear-gradient(top, white 0%, #eeeeee 50%);
            background-image: linear-gradient(to bottom, white 0%, #eeeeee 50%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0); }

        .select2-container--classic.select2-container--open.select2-container--below .select2-selection--single {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            background-image: -webkit-linear-gradient(top, #eeeeee 50%, white 100%);
            background-image: -o-linear-gradient(top, #eeeeee 50%, white 100%);
            background-image: linear-gradient(to bottom, #eeeeee 50%, white 100%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFEEEEEE', endColorstr='#FFFFFFFF', GradientType=0); }

        .select2-container--classic .select2-selection--multiple {
            background-color: white;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: text;
            outline: 0; }
        .select2-container--classic .select2-selection--multiple:focus {
            border: 1px solid #5897fb; }
        .select2-container--classic .select2-selection--multiple .select2-selection__rendered {
            list-style: none;
            margin: 0;
            padding: 0 5px; }
        .select2-container--classic .select2-selection--multiple .select2-selection__clear {
            display: none; }
        .select2-container--classic .select2-selection--multiple .select2-selection__choice {
            background-color: #e4e4e4;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0 5px; }
        .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove {
            color: #888;
            cursor: pointer;
            display: inline-block;
            font-weight: bold;
            margin-right: 2px; }
        .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #555; }

        .select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice {
            float: right; }

        .select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice {
            margin-left: 5px;
            margin-right: auto; }

        .select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove {
            margin-left: 2px;
            margin-right: auto; }

        .select2-container--classic.select2-container--open .select2-selection--multiple {
            border: 1px solid #5897fb; }

        .select2-container--classic.select2-container--open.select2-container--above .select2-selection--multiple {
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0; }

        .select2-container--classic.select2-container--open.select2-container--below .select2-selection--multiple {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0; }

        .select2-container--classic .select2-search--dropdown .select2-search__field {
            border: 1px solid #aaa;
            outline: 0; }

        .select2-container--classic .select2-search--inline .select2-search__field {
            outline: 0;
            box-shadow: none; }

        .select2-container--classic .select2-dropdown {
            background-color: white;
            border: 1px solid transparent; }

        .select2-container--classic .select2-dropdown--above {
            border-bottom: none; }

        .select2-container--classic .select2-dropdown--below {
            border-top: none; }

        .select2-container--classic .select2-results > .select2-results__options {
            max-height: 200px;
            overflow-y: auto; }

        .select2-container--classic .select2-results__option[role=group] {
            padding: 0; }

        .select2-container--classic .select2-results__option[aria-disabled=true] {
            color: grey; }

        .select2-container--classic .select2-results__option--highlighted[aria-selected] {
            background-color: #3875d7;
            color: white; }

        .select2-container--classic .select2-results__group {
            cursor: default;
            display: block;
            padding: 6px; }

        .select2-container--classic.select2-container--open .select2-dropdown {
            border-color: #5897fb; }

        /*! normalize.css v4.1.1 | MIT License | github.com/necolas/normalize.css */

        /**
 * 1. Change the default font family in all browsers (opinionated).
 * 2. Prevent adjustments of font size after orientation changes in IE and iOS.
 */

        html {
            font-family: sans-serif; /* 1 */
            -ms-text-size-adjust: 100%; /* 2 */
            -webkit-text-size-adjust: 100%; /* 2 */
        }

        /**
 * Remove the margin in all browsers (opinionated).
 */

        body {
            margin: 0;
        }

        /* HTML5 display definitions
   ========================================================================== */

        /**
 * Add the correct display in IE 9-.
 * 1. Add the correct display in Edge, IE, and Firefox.
 * 2. Add the correct display in IE.
 */

        article,
        aside,
        details, /* 1 */
        figcaption,
        figure,
        footer,
        header,
        main, /* 2 */
        menu,
        nav,
        section,
        summary { /* 1 */
            display: block;
        }

        /**
 * Add the correct display in IE 9-.
 */

        audio,
        canvas,
        progress,
        video {
            display: inline-block;
        }

        /**
 * Add the correct display in iOS 4-7.
 */

        audio:not([controls]) {
            display: none;
            height: 0;
        }

        /**
 * Add the correct vertical alignment in Chrome, Firefox, and Opera.
 */

        progress {
            vertical-align: baseline;
        }

        /**
 * Add the correct display in IE 10-.
 * 1. Add the correct display in IE.
 */

        template, /* 1 */
        [hidden] {
            display: none;
        }

        /* Links
   ========================================================================== */

        /**
 * 1. Remove the gray background on active links in IE 10.
 * 2. Remove gaps in links underline in iOS 8+ and Safari 8+.
 */

        a {
            background-color: transparent; /* 1 */
            -webkit-text-decoration-skip: objects; /* 2 */
        }

        /**
 * Remove the outline on focused links when they are also active or hovered
 * in all browsers (opinionated).
 */

        a:active,
        a:hover {
            outline-width: 0;
        }

        /* Text-level semantics
   ========================================================================== */

        /**
 * 1. Remove the bottom border in Firefox 39-.
 * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
 */

        abbr[title] {
            border-bottom: none; /* 1 */
            text-decoration: underline; /* 2 */
            text-decoration: underline dotted; /* 2 */
        }

        /**
 * Prevent the duplicate application of `bolder` by the next rule in Safari 6.
 */

        b,
        strong {
            font-weight: inherit;
        }

        /**
 * Add the correct font weight in Chrome, Edge, and Safari.
 */

        b,
        strong {
            font-weight: bolder;
        }

        /**
 * Add the correct font style in Android 4.3-.
 */

        dfn {
            font-style: italic;
        }

        /**
 * Correct the font size and margin on `h1` elements within `section` and
 * `article` contexts in Chrome, Firefox, and Safari.
 */

        h1 {
            font-size: 2em;
            margin: 0.67em 0;
        }

        /**
 * Add the correct background and color in IE 9-.
 */

        mark {
            background-color: #ff0;
            color: #000;
        }

        /**
 * Add the correct font size in all browsers.
 */

        small {
            font-size: 80%;
        }

        /**
 * Prevent `sub` and `sup` elements from affecting the line height in
 * all browsers.
 */

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sub {
            bottom: -0.25em;
        }

        sup {
            top: -0.5em;
        }

        /* Embedded content
   ========================================================================== */

        /**
 * Remove the border on images inside links in IE 10-.
 */

        img {
            border-style: none;
        }

        /**
 * Hide the overflow in IE.
 */

        svg:not(:root) {
            overflow: hidden;
        }

        /* Grouping content
   ========================================================================== */

        /**
 * 1. Correct the inheritance and scaling of font size in all browsers.
 * 2. Correct the odd `em` font sizing in all browsers.
 */

        code,
        kbd,
        pre,
        samp {
            font-family: monospace, monospace; /* 1 */
            font-size: 1em; /* 2 */
        }

        /**
 * Add the correct margin in IE 8.
 */

        figure {
            margin: 1em 40px;
        }

        /**
 * 1. Add the correct box sizing in Firefox.
 * 2. Show the overflow in Edge and IE.
 */

        hr {
            box-sizing: content-box; /* 1 */
            height: 0; /* 1 */
            overflow: visible; /* 2 */
        }

        /* Forms
   ========================================================================== */

        /**
 * 1. Change font properties to `inherit` in all browsers (opinionated).
 * 2. Remove the margin in Firefox and Safari.
 */

        button,
        input,
        select,
        textarea {
            font: inherit; /* 1 */
            margin: 0; /* 2 */
        }

        /**
 * Restore the font weight unset by the previous rule.
 */

        optgroup {
            font-weight: bold;
        }

        /**
 * Show the overflow in IE.
 * 1. Show the overflow in Edge.
 */

        button,
        input { /* 1 */
            overflow: visible;
        }

        /**
 * Remove the inheritance of text transform in Edge, Firefox, and IE.
 * 1. Remove the inheritance of text transform in Firefox.
 */

        button,
        select { /* 1 */
            text-transform: none;
        }

        /**
 * 1. Prevent a WebKit bug where (2) destroys native `audio` and `video`
 *    controls in Android 4.
 * 2. Correct the inability to style clickable types in iOS and Safari.
 */

        button,
        html [type="button"], /* 1 */
        [type="reset"],
        [type="submit"] {
            -webkit-appearance: button; /* 2 */
        }

        /**
 * Remove the inner border and padding in Firefox.
 */

        button::-moz-focus-inner,
        [type="button"]::-moz-focus-inner,
        [type="reset"]::-moz-focus-inner,
        [type="submit"]::-moz-focus-inner {
            border-style: none;
            padding: 0;
        }

        /**
 * Restore the focus styles unset by the previous rule.
 */

        button:-moz-focusring,
        [type="button"]:-moz-focusring,
        [type="reset"]:-moz-focusring,
        [type="submit"]:-moz-focusring {
            outline: 1px dotted ButtonText;
        }

        /**
 * Change the border, margin, and padding in all browsers (opinionated).
 */

        fieldset {
            border: 1px solid #c0c0c0;
            margin: 0 2px;
            padding: 0.35em 0.625em 0.75em;
        }

        /**
 * 1. Correct the text wrapping in Edge and IE.
 * 2. Correct the color inheritance from `fieldset` elements in IE.
 * 3. Remove the padding so developers are not caught out when they zero out
 *    `fieldset` elements in all browsers.
 */

        legend {
            box-sizing: border-box; /* 1 */
            color: inherit; /* 2 */
            display: table; /* 1 */
            max-width: 100%; /* 1 */
            padding: 0; /* 3 */
            white-space: normal; /* 1 */
        }

        /**
 * Remove the default vertical scrollbar in IE.
 */

        textarea {
            overflow: auto;
        }

        /**
 * 1. Add the correct box sizing in IE 10-.
 * 2. Remove the padding in IE 10-.
 */

        [type="checkbox"],
        [type="radio"] {
            box-sizing: border-box; /* 1 */
            padding: 0; /* 2 */
        }

        /**
 * Correct the cursor style of increment and decrement buttons in Chrome.
 */

        [type="number"]::-webkit-inner-spin-button,
        [type="number"]::-webkit-outer-spin-button {
            height: auto;
        }

        /**
 * 1. Correct the odd appearance in Chrome and Safari.
 * 2. Correct the outline style in Safari.
 */

        [type="search"] {
            -webkit-appearance: textfield; /* 1 */
            outline-offset: -2px; /* 2 */
        }

        /**
 * Remove the inner padding and cancel buttons in Chrome and Safari on OS X.
 */

        [type="search"]::-webkit-search-cancel-button,
        [type="search"]::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        /**
 * Correct the text style of placeholders in Chrome, Edge, and Safari.
 */

        ::-webkit-input-placeholder {
            color: inherit;
            opacity: 0.54;
        }

        /**
 * 1. Correct the inability to style clickable types in iOS and Safari.
 * 2. Change font properties to `inherit` in Safari.
 */

        ::-webkit-file-upload-button {
            -webkit-appearance: button; /* 1 */
            font: inherit; /* 2 */
        }

        /*# sourceMappingURL=template.css.map */

    </style>
</head>
<body>
<div class="page-container ">
    <div class="inner-block">
        @yield('content')
    </div>
</div>
</body>
</html>