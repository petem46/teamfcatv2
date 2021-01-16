import { Mark } from "tiptap";
import { toggleMark } from "tiptap-commands";

export default class TextH extends Mark {
  get name() {
    return "textH";
  }

  get defaultOptions() {
    return {
      class: ["text-h2", "text-h5", "text-h6"]
    };
  }

  get schema() {
    return {
      attrs: { class: { default: "text-h5" } },
      parseDOM: [
        {
          // class: "teal--text",
          getAttrs: mark => ({ class: `${mark.attrs.class}` })
        }
      ],
      toDOM: mark => ["span", { class: `${mark.attrs.class}` }, 0]
    };
  }

  commands({ type }) {
    return attrs => toggleMark(type, attrs);
  }
}
