                <div class="form-group">
                    <label>Pasien</label>
                    {!! Form::select('pasien_id', $pasien, null, ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    <label>Jenis Pasien</label>
                    {!! Form::select('jenis', ['Umum'=>'Umum', 'Bersalin'=>'Bersalin'], null, ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    <label>Keterangan</label>
                    {!! Form::text('keterangan', null, ['class'=>'form-control']) !!}
                </div>  