@extends('layouts.master')

@section('content')
    
    <div class="container mt-2">
        <h1 align="center">{{ $msgtitulo }}</h1>
            @if (isset($sucesso) && $sucesso)
                @php $msgclass="alert alert-success" @endphp
            @elseif(count($errors) > 0 ) 
                @php $msgclass="alert alert-warning" @endphp
            @else
                @php $msgclass="alert alert-info" @endphp
            @endif  
        <div class="{{ $msgclass }}" role="alert">
                    <h2 align="center">{{ $msgstatus }}</h2>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Cliente</th>
                    <th>E-mail</th>
                    <th>CPF/CNPJ</th>
                    <th>Exibir</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody id="myTable">
                @foreach($customers as $customer )
                    <tr>    
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->getFullName() }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->cpf_cnpj }}</td>
                        <td><a href="{{ url('/') }}/customer/read/{{ $customer->id }}">Exibir</a></td>
                        <td><a href="{{ url('/') }}/customer/edit/{{ $customer->id }}">Editar</a></td>
                        <td><a href="{{ url('/') }}/customer/predelete/{{ $customer->id }}">Deletar</a></td>
                    </tr>
                @endforeach                
            </tbody>
        </table>
        <p>Criado em 28/08/2018.</p>

        {{ $customers->links() }}
        <p>Note que basta incluir o link de paginação acima.</p>

    </div>

@endsection