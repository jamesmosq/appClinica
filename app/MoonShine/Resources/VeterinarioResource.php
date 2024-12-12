<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Veterinario;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;

/**
 * @extends ModelResource<Veterinario>
 */
class VeterinarioResource extends ModelResource
{
    protected string $model = Veterinario::class;

    protected string $title = 'Veterinarios';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $detailInModal = false;

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Nombre','nombre'),
                Text::make('Apellido','apellido'),
                Text::make('Telefono','telefono'),
                Text::make('Email','email'),
                Text::make('Especialidad','especialidad'),
                Text::make('Cedula Profesional','cedula_profesional'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Nombre','nombre'),
                Text::make('Apellido','apellido'),
                Text::make('Telefono','telefono'),
                Text::make('Email','email'),
                Text::make('Especialidad','especialidad'),
                Text::make('Cedula Profesional','cedula_profesional')
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Nombre','nombre'),
                Text::make('Apellido','apellido'),
                Text::make('Telefono','telefono'),
                Text::make('Email','email'),
                Text::make('Especialidad','especialidad'),
        ];
    }

    /**
     * @param Veterinario $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'nombre' => ['required','string','max:255'],
            'apellido' => ['required','string','max:255'],
            'telefono' => ['required','string','max:255'],
            'email' => ['required','string','max:255', 'email'],
            'especialidad' => ['required','string','max:255'],
            'cedula_profesional' => ['required','string','max:255'],
        ];
    }
}
