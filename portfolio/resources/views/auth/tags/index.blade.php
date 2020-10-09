@extends('auth.layouts.master')

@section('title', 'Проекти')

@section('content')
    <div class="content__block content__buttons">
        <a href="{{ route('tags.create') }}" class="btn btn-success">Додати тег</a>
    </div>
    <section class="content__block content__section section">
        <div class="section__header"><h2>Список тегів</h2></div>
        <div class="section__body">
            <table class="table">
                <tbody>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Слаг
                    </th>
                    <th>
                        Назва
                    </th>
                    <th class="actions">
                        Дії
                    </th>
                </tr>
                @foreach($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->id }}
                        </td>

                        <td>
                            {{ $tag->slug }}
                        </td>

                        <td>
                            {{ $tag->defaultLocalization->name }}
                        </td>


                        <td class="actions">
                            <form action="{{ route('tags.destroy', $tag) }}" method="POST">
                                <a class="btn btn-warning" type="button" href="{{ route('tags.edit', $tag) }}">Редагувати</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" type="submit">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection