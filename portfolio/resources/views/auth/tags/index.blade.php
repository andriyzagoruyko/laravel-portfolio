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
                                <a href="{{ route("tags.edit", $tag->id) }}" class="btn btn-primary">
                                    <div class="icon"><img src="/assets/admin/img/icons/edit.svg" alt=""></div>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <span class="icon"><img src="/assets/admin/img/icons/remove.svg" alt=""></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection