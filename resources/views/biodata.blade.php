@extends('layouts.main')

@section('content')
    


<style>

h1 {
    text-align: center;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  padding: 8px;
}

.atas {
    background-color: #009000;
    text-align: center
}

</style>
<title>{{ $tittle }} | Who</title>
<body>
 
    
    <h1>Biodata</h1>
    <table align="center" cellspacing="0" cellpadding="5" width="800"> 

    <tr class="atas">
     <td>Data</td>
     <td>Keterangan</td>
     <td width="300">Gambar</td>
    </tr>
 
 <tr>
    <td>Nama</td>
    <td>Rigen</td>
    <td rowspan="5"><img src="{{ asset('assets/images/aryae.jpeg') }}" alt="" width="300"></td>

</tr>

<tr>
    <td>Umur</td>
    <td>80(delapan puluh)</td>

</tr>
<tr>
    <td>Kelas</td>
    <td>XII-Tataboga</td>
</tr>
<tr>
    <td>Asal</td>
    <td>Jakarta</td>

</tr>


</table>
</body>
</html>
@endsection