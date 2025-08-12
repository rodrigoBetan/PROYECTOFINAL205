<?php echo Form::open(['url' => 'foo/bar']); ?>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('nombre') }}</label>
    <div>
        {{ Form::text('nombre', old('nombre', $product->nombre), [
            'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),
            'placeholder' => 'Nombre'
        ]) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">product <b>nombre</b> instruction.</small>
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('imagen') }}</label>
    <div>
        {{ Form::file('imagen', [
            'class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : '')
        ]) }}
        {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">product <b>imagen</b> instruction.</small>
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', old('descripcion', $product->descripcion), [
            'class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''),
            'placeholder' => 'Descripcion'
        ]) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">product <b>descripcion</b> instruction.</small>
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('sctock') }}</label>
    <div>
        {{ Form::text('sctock', old('sctock', $product->sctock), [
            'class' => 'form-control' . ($errors->has('sctock') ? ' is-invalid' : ''),
            'placeholder' => 'Stock'
        ]) }}
        {!! $errors->first('sctock', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">product <b>sctock</b> instruction.</small>
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('precio') }}</label>
    <div>
        {{ Form::text('precio', old('precio', $product->precio), [
            'class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''),
            'placeholder' => 'Precio'
        ]) }}
        {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">product <b>precio</b> instruction.</small>
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('categoria') }}</label>
    <div>
        <x-select name="categoria" :options="$categoria"></x-select>
    </div>
</div>

<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="#" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
        </div>
    </div>
</div>
