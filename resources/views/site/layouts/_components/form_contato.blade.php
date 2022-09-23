{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" value="{{ old('nome') }}" class="{{ $classe }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input name="telefone" type="text" placeholder="Telefone" value="{{ old('telefone') }}" class="{{ $classe }}">
     {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" type="text" placeholder="E-mail" value="{{ old('email') }}" class="{{ $classe }}">
     {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value = "{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') ==  $motivo_contato->id ? 'selected' : ''}}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
     {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea name="mensagem"  class="{{ $classe }}">{{old('mensagem') != '' ?  old('mensagem') :  'Preencha aqui a sua mensagem' }}</textarea>
     {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

@if($errors->any())
    <div style="background: red; width: 100%">
        @foreach ($errors->all() as $erro)
            {{ $erro }}
            <br/>
        @endforeach
    </div>
@endif