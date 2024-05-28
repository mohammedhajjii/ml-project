package ml.cf.collaborativefilteing.models;

import jnr.ffi.annotations.In;
import lombok.*;
import org.springframework.data.cassandra.core.mapping.PrimaryKey;
import org.springframework.data.cassandra.core.mapping.Table;

@Table("rating_by_user")
@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@Builder
@ToString
public class RatingByUser {
    @PrimaryKey
    private Integer userId;
    private Integer bookId;
    private float rating;
}
