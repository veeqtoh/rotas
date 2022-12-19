<div
    wire:ignore
    x-data="{pond: null}"
    x-init="
        FilePond.registerPlugin(FilePondPluginImagePreview);
        pond = FilePond.create($refs.input);
        pond.setOptions({
            allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
            labelIdle:'Browse or Drag and Drop',
            labelFileProcessingComplete: 'Upload complete',
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                },
            },
        });
        @this.on('notify-saved', e => {
            pond.removeFiles();
        });"
">
    <input type="file" x-ref="input">
</div>

{{-- <div
    x-data
    x-init="
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.setOptions({
            allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
            server:{
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                },
            },
        });
        var Pond = FilePond.create($refs.input);
        @this.on('notify-saved', e => {
            Pond.removeFiles();
        });"
    wire:ignore
    >
    <input type="file" x-ref="input">
</div> --}}
