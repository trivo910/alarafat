import Quill from 'quill';
import 'quill/dist/quill.snow.css';
import '../css/blog-editor.css';

const toolbar = [
    [{ header: [1, 2, 3, false] }],
    ['bold', 'italic', 'underline', 'strike'],
    ['link', 'image', 'blockquote'],
    [{ list: 'ordered' }, { list: 'bullet' }],
    [{ indent: '-1' }, { indent: '+1' }],
    [{ align: [] }],
    ['clean'],
];

document.querySelectorAll('[data-blog-editor]').forEach((editorElement) => {
    const form = editorElement.closest('form');
    const sourceName = editorElement.dataset.sourceName || 'content';
    const contentField = form.querySelector(`[name="${sourceName}"]`);
    if (!contentField) return;

    const editor = new Quill(editorElement, {
        theme: 'snow',
        modules: { toolbar },
        placeholder: editorElement.dataset.placeholder || 'Write your content...',
    });

    if (contentField.value.trim()) {
        editor.clipboard.dangerouslyPasteHTML(contentField.value);
    }

    form.addEventListener('submit', () => {
        contentField.value = editor.root.innerHTML;
    });
});

document.querySelectorAll('[data-add-row]').forEach((button) => {
    button.addEventListener('click', () => {
        const name = button.dataset.addRow;
        const template = document.getElementById(`${name}-template`);
        const target = document.getElementById(`${name}-list`);
        if (!template || !target) return;

        const row = template.content.cloneNode(true);
        if (name === 'itinerary') {
            const index = Number(target.dataset.nextIndex || 0);
            row.querySelectorAll('[name]').forEach((field) => {
                field.name = field.name.replace('__INDEX__', String(index));
            });
            target.dataset.nextIndex = String(index + 1);
        }

        target.append(row);
    });
});

document.addEventListener('click', (event) => {
    const removeButton = event.target.closest('[data-remove-row]');
    if (removeButton) removeButton.closest('[data-repeat-row]')?.remove();
});