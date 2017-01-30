<!DOCTYPE html>
<html>
  <head>
    <style>
        @page {
          size:  8.27in  11.69in;
          /*margin: 45pt;
          font-size: 11pt;*/
        }
        table.solid {
          border: 1px #000 solid;
          margin: -1px;
        }
        table.solid tr.solidcell td {
          border: 1px #000 solid;
          margin: -1px;
        }
        table {
          width: 100%;
          font-size: 12pt;
          padding: 5px;
          margin: -1px;
          border: 1px #000 solid;
        }
        table td {
          border: 0px #000 solid;
          padding: 2px;
          margin: 0px;
        }
        table tr {
          margin: 0px;
          padding: 0px;
        }
        table.unsolid {
          border: 0px;
        }

        table.unsolid {
          border: 0px;
        }
    </style>
    @yield('css')
  </head>
  <body>
    @yield('table')
  </body>
</html>
