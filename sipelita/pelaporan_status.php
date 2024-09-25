<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
  <foreignObject width="100%" height="100%">
    <style>
      html,body{
          width: 100%;
          height: 100%
      }
        body{
            margin: 0;
            background:transparent;
            transition: .3s;
        }
        body::before, body::after {
        content: '';
        position: absolute;
        bottom: 50%;
        left: 50%;
        width: 400vw;
        height: 400vw;
        border-radius: 45% 48% 43% 47%;
        transform: translate(-50%, 0);
        box-shadow: 0 0 0 50vw #54caff9e;
                animation: rotate 10s infinite linear;
      }
      body::after {
        border-radius: 43% 47% 44% 48%;
        animation: rotate 10s infinite -1s linear;
      }
      @keyframes rotate {
        0% {
          transform: translate(-50%, 0) rotate(0);
        }
        100% {
          transform: translate(-50%, 0) rotate(360deg);
        }
      }
    </style>
      <body xmlns="http://www.w3.org/1999/xhtml">
      </body>
    </foreignObject>
</svg>


