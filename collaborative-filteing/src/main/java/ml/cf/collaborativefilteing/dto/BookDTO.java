package ml.cf.collaborativefilteing.dto;

import lombok.*;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@Builder
public class BookDTO {
    private String name;
    private String imageUrl;
    private float expectedRating;
}
