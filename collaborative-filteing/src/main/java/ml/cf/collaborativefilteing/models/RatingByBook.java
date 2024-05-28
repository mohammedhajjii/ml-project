package ml.cf.collaborativefilteing.models;

import lombok.*;
import org.springframework.data.cassandra.core.mapping.PrimaryKey;
import org.springframework.data.cassandra.core.mapping.Table;

@Table("rating_by_book")
@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@Builder
@ToString
public class RatingByBook {
    @PrimaryKey
    private Integer bookId;
    private Integer userId;
    private double rating;
}
