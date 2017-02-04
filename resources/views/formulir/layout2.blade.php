<!DOCTYPE html>
<html>
  <head>
    <style>
        @page {
          size:  8.27in  11.69in;
          /*margin: 45pt; */
          font-size: 11pt;
        }
        .solid {
          border: 1px #000 solid;
          margin: -1px;
          padding: 11pt;
        }
        table {
          border-collapse: collapse;
          border-width: 0 0 1px 1px;
    
        }
        
        table.margin td {
          padding: 5pt;
        }
        
    </style>
    @yield('css')
  </head>
  <body>
    @yield('table')
  </body>
</html>
