import { useForm } from '@inertiajs/vue3'

export function useEntityForm(activeLocale, entity) {
    const form = useForm({
        locales: entity.translates
            ? entity.translates.reduce((acc, translate) => {
                acc[translate.locale_code] = translate;
                return acc;
            }, {})
            : {
                [activeLocale]: {},
            },
        static: entity ? Object.fromEntries(
            Object.entries(entity).filter(([key]) => !['id', 'translates', 'created_at', 'updated_at'].includes(key))
        ) : {}
    });

    return {
        form
    }
}